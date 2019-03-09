<template>
    <div>
        <vue-dropzone class="chart-image-block" ref="myVueDropzone" 
        id="dropzone" :options="dropzoneOptions"  @vdropzone-removed-file='removeFile' 
        @vdropzone-success='success' @vdropzone-sending='sendingEvent' 
        @vdropzone-mounted='vdropzoneMounted' @vdropzone-error='failed'></vue-dropzone>
        <span class="definition-txt-alert" v-if="fileErrors">
            {{ fileErrors }}
        </span>
    </div>
</template>

 

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
import axios from 'axios'
import Vue from 'vue'

export default {
    components: {
        vueDropzone: vue2Dropzone
    },
    props: [ 'employer_id', 'csrf_token','resource_type'],
    data: function () {
    return {
        dropzoneOptions: {
            url: '/employers/image?resource_type='+this.resource_type,
            thumbnailWidth: 200,
            addRemoveLinks: false,
            previewsContainer: false,
            maxFiles: 30,
            dictDefaultMessage: `
                    <div class="chart-image-inner">
                        <div class="chart-image-icon">
                            <span class="chart-icon">
                                <i class="fa fa-picture-o fa-4x common-color-grey" aria-hidden="true"></i>
                            </span>
                        </div>
                        <span class="chart-image-text card-fw-bold space-pd-top-sm">このエリアに画像ファイルをドラッグ＆ドロップ</span><br>
                        <span class="chart-image-text">または</span><br>
                        <span class="chart-image-link">画像をフォルダから選択</span>
                    </div>`,
            headers: {
            "X-CSRF-TOKEN": window.axios.defaults.headers.common['X-CSRF-TOKEN']
            },
            init: function () {
              this.on("removedfile", function (file) {
                if(file.manuallyAdded == true) {
                $.post({
                url: $('[name="delete_url"]').val(),
                data: {name: file.name, _token: window.axios.defaults.headers.common['X-CSRF-TOKEN']},
                dataType: 'json',
                success: function (data) {
                    }
                });
                }else {
                    $.post({
                    url: $('[name="delete_url"]').val(),
                    data: {name: file.name,uuid: file.upload.uuid, _token: $("[name=csrf_token]").val()},
                    dataType: 'json',
                    success: function (data) {
                        }
                    });
                }
              });
            },
        },
        photos: [],
        fileErrors: null,
    };
    },
    methods: {
        removeFile: function(file) {
            //
        },
        success: function(file, response) {
            $('.loading-data').hide();
            this.$parent.$emit('imageUploaded');
            this.$parent.$emit('updateImagesAttribute', response.data)
        },
        failed: function(file, message, xhr) {
            this.fileErrors= message.errors.file[0];
            $('.loading-data').hide();
        },
        sendingEvent (file, xhr, formData) {
            $('.loading-data').show();
            formData.append('uuid', file.upload.uuid);
        },
        vdropzoneMounted: function() {
            //
        },
        manuallyAddFile: function(file, url) {
            this.$refs.myVueDropzone.manuallyAddFile(file, url);
        },
 
      
    },

}

</script>
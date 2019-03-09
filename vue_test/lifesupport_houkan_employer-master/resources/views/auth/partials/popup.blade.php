<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog card-mx-900 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-fw-bold" id="image-gallery-title"></h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body e-modal-body card-body-height">
                <div class="card-img-edit">
                <form action="">
                    <figure class='card-img-edit-figure'>
                    <div class="card-edit-fig-inner">
                    <div class="card-edit-image">
                        <div>
                            <img id="image-gallery-image" class="img-fluid" :src="image.path">
                        </div>
                    </div>
                    
                    </div>
                    
                </figure><!-- .card-img-edit-figure -->
                <div class="card-edit-summary">
                    <div class="card-small-short">
                    @{{image.dimension}}
                    </div>
                    <div class="space-pd-sm">
                    <textarea class="card-textarea-sm u-hg-min-76" placeholder="" maxlength="40" v-model="image.description" v-bind:class="{'definition-txt-error' : errors.description}" @keyup="wordCount"></textarea>
                    <span class="definition-txt-alert" v-if="errors.description" :errors="errors">
                        @{{ errors.description[0] }}
                    </span>
                    <div class="pull-right card-small-short">@{{word_count}} 文字 / 40文字 </div>
                    </div>
                    <div class="space-pd-top-sm card-small-short">※説明文はこの写真を使用しているほかの施設・求人にも反映されます</div>
                    <div class="space-pd-top-md">
                    <button type="button" class="blue-btn card-wd-100 card-fw-bold space-pd-sm" @click.prevent = "updateImage" data-dismiss="modal">写真に説明文を追加する</button>
                    </div>
                </div>
                </form>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                </button>
    
                <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
    </div>

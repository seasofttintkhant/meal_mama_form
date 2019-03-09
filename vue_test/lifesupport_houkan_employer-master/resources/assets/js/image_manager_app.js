
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueResource from 'vue-resource'

window.Vue = require('vue');
Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('drop-zone', require('./components/DropZone.vue'));

const app = new Vue({
    el: '#app',
    data: {
      word_count : 0,
      images: [],
      image: {
        id: "",
        description: "",
        path: "",
        dimension: "",
        resource_id: "",
        resource_type: "",
        employer_id: "",
        recommended_size: "",
        created_at: "",
        updated_at: "",
      },
      pagination: {
          current_page: "",
          last_page: "",
          next_page_url : "",
          prev_page_url : "",
          pages : [],
          total : 0,
      },
      errors: [],
      searchParams : {
        description: "",
        resource_id: "",
        resource_type: "",
        page : ""

      },
      show_suggestion : false,
      urlParams : [],
      full_url: "",
      search_description : "",
      suggestions : [],
    },
    methods: {
      fetchPhotos(){
        $('.loading-data').show();
        this.$http.get('/employers/image',{params : this.searchParams})
            .then(res => res.json())
            .then(res => {
            this.images = res.data;
            this.makePagination(res.meta, res.links);
            $('.loading-data').hide();
        });
      },

      changePage(page){
        this.searchParams.page = parseInt(page)
        this.fetchPhotos()
 
      },
      deleteImage: function(id) {
        $('.loading-data').show();
        axios.delete('/employers/image/'+id+'/delete')
          .then(res => {
              this.fetchPhotos();
              $('.loading-data').hide();
          });
      },
      getImage(id) {
        this.$http.get('/employers/'+id+'/image').then(response => {  
           console.log(response);
            this.image = response.data.image;

            if(this.image.description !== "" && this.image.description !== null){
                this.word_count = this.image.description.length
            }
            
        })
      },
      clearImage() {
          this.image.id = ""
          this.image.description = ""
          this.image.path = ""
          this.image.dimension = ""
          this.image.resource_id = ""
          this.image.resource_type = ""
          this.image.employer_id = ""
          this.image.recommended_size = ""
          this.image.created_at = ""
          this.image.updated_at = ""
      },
      updateImage() {
        this.$http.post('/employers/image/description',this.image).then(response => {   
            this.$emit('imageUploaded');
        }).catch(err =>{ 
          $('.loading-data').hide();
          if (err.status == 422) {
                  this.errors = err.data.errors;   
            }
        })
      },
      makePagination(meta,links){
        var pages = [];
        for(var i=1;i<=  meta.last_page;i++)
        {
           pages.push(i);
        }

        if(pages != "" || pages !=null){
          this.show_pagination =true
        }
        this.pagination = {
              current_page: meta.current_page,
              last_page: meta.last_page,
              next_page_url : links.next,
              prev_page_url : links.prev,
              pages : pages,
              total : meta.total ,
        };
      },
      filterBy(code) {
        this.searchParams.description = "";
        this.search_description = "";
        var code = parseInt(code);
        this.searchParams.code = code;
        this.fetchPhotos();
      },
      searchByKey() {
        this.searchParams.description = this.search_description;
        this.fetchPhotos();
      },
      wordCount(){
        this.word_count = this.image.description.length
      },
      selectSuggestion(suggestion){
        this.show_suggestion = false
        this.searchParams.resource_id = suggestion.id
        this.searchParams.resource_type = suggestion.type
        $('#search_field').val(suggestion.title)
      },
      toggleSuggestion(){
        
        if(!this.show_suggestion){
          this.$http.get('/api/suggestion')
          .then(res => res.json() )
          .then(res => {  
            this.suggestions = res.items 
            this.show_suggestion = true
          })
        }
        else{
          this.show_suggestion = false
        }
      },
      clear(){
        $('#search_field').val("")
        this.search_description =""
      }

    },
    created() {
     
      this.$on('imageUploaded', function() {
        this.fetchPhotos();
      });

      this.urlParams = new URLSearchParams(window.location.search);
      this.full_url = window.location.protocol + "//" + window.location.host + window.location.pathname;
      this.searchParams.resource_id =  this.urlParams.get('resource_id') != null ? this.urlParams.get('resource_id') : "";
      this.searchParams.resource_type =  this.urlParams.get('resource_type') != null ? this.urlParams.get('resource_type') : "";
      this.searchParams.description =  this.urlParams.get('description') != null ? this.urlParams.get('description') : "";
      this.searchParams.code =  this.urlParams.get('code') != null ? this.urlParams.get('code') : "";
      this.searchParams.page =  this.urlParams.get('page') != null ? this.urlParams.get('page') : "";
       this.fetchPhotos();
    }
    
});

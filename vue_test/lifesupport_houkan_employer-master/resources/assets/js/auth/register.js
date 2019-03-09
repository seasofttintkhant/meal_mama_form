
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./../bootstrap');
import Vue from "vue";
import VueResource from 'vue-resource'


Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('drop-zone', require('../components/DropZone.vue'));

const app = new Vue({
    el : "#app",
        data : {
            step:1,
            name : "", 
            name_kana : "", 
            in_charge_last_name : "", 
            in_charge_first_name : "", 
            in_charge_last_name_kana : "",
            in_charge_first_name_kana : "",
            phonenumber : "",
			email : "",
			zip_code : "",
			prefecture_id : "",
			city_id: "",
			street_address :"",
			building : "",
			fax : "",
			password : "",
            c_password :"",
            prefectures : [],
            cities : [],
            errors : [],
            images : [],
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
            word_count : 0, //Image Description
        },
        created(){
            this.getPrefectures();

            this.$on('updateImagesAttribute', function(image) {
                this.images.push(image)
            }); 
        },
        methods : {
		next(e) {
			e.preventDefault()
            let name = this.name
            let name_kana = this.name_kana
            let in_charge_last_name = this.in_charge_last_name
            let in_charge_first_name = this.in_charge_first_name
            let in_charge_last_name_kana = this.in_charge_last_name_kana
            let in_charge_first_name_kana = this.in_charge_first_name_kana
            let phonenumber = this.phonenumber
            let email = this.email

            let userData = {
                name, 
                name_kana, 
                in_charge_last_name, 
                in_charge_first_name, 
                in_charge_last_name_kana,
                in_charge_first_name_kana,
                phonenumber,
                email
              };


            this.$http.post('/pre_register', userData).then(response => {				
				this.step++;
            }).catch(err =>{
       
                if (err.status == 422) {
                    this.errors = err.data.error;   
				}
            })
		
		},
        getPrefectures(){
            fetch('/api/prefectures')
            .then(res=> res.json())
            .then(res => {
                this.prefectures = res.prefectures
            })  
        },
        getCities(prefecture_id){
            fetch('/api/'+prefecture_id+'/cities')
            .then(res => res.json())
            .then(res => {
                this.cities = res.cities
            })
        },
        fetchAddress: function(e) {
            var zip= this.zip_code
            var url = '/api/town?postal_code=' + zip;
            this.$http.get(url)
            .then(res => res.json())
            .then(res => {
            var town = res.town;
            if(town != "" && town != null){
                this.prefecture_id = town.prefecture_id
                //Get all cities by prefecture
                this.getCities(this.prefecture_id)
                this.city_id = town.city_id
              } 
          });  
        },
        handleSubmit(e) {
			e.preventDefault()  
            let name = this.name
            let name_kana = this.name_kana
            let in_charge_last_name = this.in_charge_last_name
            let in_charge_first_name = this.in_charge_first_name
            let in_charge_last_name_kana = this.in_charge_last_name_kana
            let in_charge_first_name_kana = this.in_charge_first_name_kana
            let phonenumber = this.phonenumber
            let email = this.email
            let zip_code = this.zip_code
            let prefecture_id = this.prefecture_id
            let city_id = this.city_id
            let street_address = this.street_address
            let building = this.building
            let fax = this.fax
            let password = this.password
            let c_password = this.c_password
            let images = this.images

            let userData = {
                name, 
                name_kana, 
                in_charge_last_name, 
                in_charge_first_name, 
                in_charge_last_name_kana,
                in_charge_first_name_kana,
                phonenumber,
				email,
				zip_code,
				prefecture_id,
				city_id,
				street_address,
				building,
				fax,
				password,
                c_password,
                images
			  };
			  

            this.$http.post('/register', userData).then(response => {
				window.location.href = "/provisional"
             
            }).catch(err =>{

                if (err.status == 422) {
                    this.errors = err.data.error;   
				}
            })
        },
        getImage(id) {
            this.$http.get('/employers/'+id+'/image').then(response => {  
                this.image = response.data.image;
    
                if(this.image.description !== "" && this.image.description !== null){
                    this.word_count = this.image.description.length
                }
                
            })
        },
        wordCount(){
            this.word_count = this.image.description.length
        },
        updateImage() {
            $('.loading-data').show();
            this.$http.post('/employers/image/description',this.image).then(response => {   
              for(var i=0;i<=this.images.length;i++)
              {
           
                if(this.images[i].id == this.image.id)
                {
                  this.images[i].description = this.image.description
                  break;
                }
      
              }
              $('.loading-data').hide();
            }).catch(err =>{ 
              $('.loading-data').hide();
              if (err.status == 422) {
                      this.errors = err.data.errors;   
                }
            })
          },
        deleteImage(id) {
            $('.loading-data').show();    
            axios.delete('/employers/image/'+id+'/delete')
              .then(res => {
                this.resetImageData(res.data.deleted_image_id)
                $('.loading-data').hide();
              });
          },
          resetImageData(id){
            var images = this.images
            var images = images.filter(function(image){
                return image.id !== id
            });
            this.images = images
          },
    }
});

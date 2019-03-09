
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./../bootstrap');
import Vue from "vue";
import VueResource from 'vue-resource'
import * as VueGoogleMaps from "vue2-google-maps";


Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
Vue.use(VueGoogleMaps, {
  load: {
    key: "AIzaSyAeaMozycpumGeF5_FmgKYg1rSCMOPuBrI",
    libraries: "places" // necessary for places input
  }
});



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('drop-zone', require('../components/DropZone.vue'));
Vue.component('google-map', require('../components/GoogleMap.vue'));

const app = new Vue({
    el: '#app',
    data : {
        facility : "",
        service_rows : [],
        errors : {},
        show : false ,
        showbody : false,
        facility_category_id : "",
        service_types : [],
        name : "", 
        name_kana : "", 
        zip : "",
        prefecture_id : "",
        city_id: "",
        street_address :"",
        lat : 35.6631642,
        lng : 139.7317782,
        establish_year :"",
        establish_month :"",
        establish_day :"",
        building : "",
        number_of_beds : "",
        emergency_designation : "",
        open_time : "",
        holiday : "",
        average_patients : "",
        ambulance_per_year : "",
        staff_info : "",
        fulltime_doctor_info : "",
        parttime_doctor_info : "",
        equip_info : "",
        director_name : "",
        director_history : "",
        has_dormitory : 0,
        has_nursery : 0,
        prescription_kind : "",
        avarage_prescription_number : "",
        visiting_area : "",
        target_age : "",
        capacity : "",
        work_environment_checked : false,
        question_1 : 3,
        question_2 : 3,
        question_3 : 3,
        question_4 : 3,
        question_5 : 3,
        question_6 : 3,
        access : "",
        years : [],
        months : [],
        days :[],
        prefectures : [],
        cities : [],
        images : [],
        popup_images : [],
        pagination : {
          current_page: "",
          last_page: "",
          next_page_url : "",
          prev_page_url : "",
          pages : [],
          total : 0,
        },
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
          updated_at: ""
        },
        pagination: {
          current_page: "",
          last_page: "",
          next_page_url: "",
          prev_page_url: "",
          pages: [],
          total: 0
        },
        errors: [],
        searchParams: {
          description: "",
          resource_id: "",
          resource_type: "",
          page: ""
    
        },
        show_suggestion: false,
        urlParams: [],
        full_url: "",
        search_description: "",
        suggestions: [],
        selected_images : [],
        word_count : 0,
      },

      created(){
        this.getYears(); 
        this.getPrefectures();  
        this.$on('updateImagesAttribute', function(image) {
            this.images.push(image)
          }); 
        this.$on('locationSet', function(location) {
            this.lat= location.lat
            this.lng= location.lng
          }); 
      },
      methods : {
        getYears(){
          var yearArr=[];
          for(var i=1838;i<=2020;i++)
          {
            yearArr.push(i);
          }
  
          this.years= yearArr.reverse();
        },
        getMonths(){
            var monthArr = {
                1 : "01",
                2 : "02",
                3 : "03",
                4 : "04",
                5 : "05",
                6 : "06",
                7 : "07",
                8 : "08",
                9 : "09",
                10 : "10",
                11 : "11",
                12 : "12",
               "春" : "春",
               "夏" : "夏",
               "秋" : "秋",
               "冬" : "冬",
            }
  
            this.months= monthArr;
        },
        getDays(){
          var year = $("#establish_year").val();
          var month = $("#establish_month").val();
          var total_days=this.daysInMonth (month, year);
          var daysArr=[];
          for(var i=1;i<=total_days;i++)
          {
            var val= this.pad(i,2);
            daysArr[i]=val;
          }
          this.days =daysArr.filter(function (el) {
            return el != null;
          });
        },
        daysInMonth (month, year) {
            return new Date(year, month, 0).getDate();
        },
        pad(num, size) {
              var s = num+"";
              while (s.length < size) s = "0" + s;
              return s;
          },
   
        getServiceTypes(id){
         
          
          if(id!=="")
          {
            fetch('/facilities/'+id+'/get_facility_service_types')
            .then(res => res.json())
            .then(res => {
              var rows = 1;
              
              var service_types = res.service_types;
              if(service_types.length > 3){
               rows = Math.ceil(res.service_types.length / 3)
              }
              var rows_data = {};
          
              for(var a=0; a < rows ; a++)
              {      
                  var tempArr = [];
                  tempArr = service_types.slice(0, 3);
                  rows_data[a]=Object.assign({}, tempArr); ;  
                  service_types.splice(0,3);            
              }
        
              this.service_rows = rows_data;
              this.facility_category_id = id
              this.showbody = true;
            });
          }else{
            this.showbody = false;
            this.facility_category_id = ""
          }
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
            var zip = this.zip
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
              this.street_address = town.name
              this.lat = town.lat
              this.lng = town.lon
  
              this.$refs.map.setMarker(this.lat,this.lng)
            } 
           
        });  
        },
        environmentQuestions(e){
            if(e.target.checked){
              this.work_environment_checked = true
            }
            else{
              this.work_environment_checked = false
            }    
        },
        handleSubmit(){
           $('.h-popup-container').css({top:document.documentElement.scrollTop + 100});
           $('.loading-data').show();
           var data = this.getSubmitParams()
            this.$http.post('/facilities',data).then(response => {
                window.location.href  ="/facilities"
            }).catch(err =>{
              $('.loading-data').hide();
              if (err.status == 422) {
                      this.errors = err.data.error;
                }
            })
        },
        preview(){
          var data = this.getSubmitParams();
          console.log(data);
          var form = document.createElement("form");
          
          form.setAttribute("action",'http://houkanemployee.ssdn.asia/facilities/preview');
          form.setAttribute("method",'post');
          form.setAttribute("id",'temp');
          form.setAttribute("target",'_blank');
          for (var i in data) {
            if (data.hasOwnProperty(i)) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = i;
                Array.isArray(data[i])
                {
                  data[i] = JSON.stringify(data[i]);
                }
                input.value = data[i];
                form.appendChild(input);
            }
        }
        document.body.appendChild(form);
        form.submit();
        form.remove();

        },
        getSubmitParams(){
          let facility_category_id = this.facility_category_id
          let establish_year = this.establish_year
          let establish_month = this.establish_month
          let establish_day = this.establish_day
          let name = this.name 
          let name_kana = this.name 
          let service_types = this.service_types
          let zip = this.zip
          let prefecture_id = this.prefecture_id
          let city_id= this.city_id
          let street_address = this.street_address
          let lat = this.lat
          let lng = this.lng
          let building = this.building
          let question_1 = this.question_1
          let question_2 = this.question_2
          let question_3 = this.question_3
          let question_4 = this.question_4
          let question_5 = this.question_5
          let question_6 = this.question_6
          let access = this.access
          let number_of_beds = this.number_of_beds 
          let emergency_designation = this.emergency_designation
          let open_time = this.open_time
          let holiday = this.holiday
          let average_patients = this.average_patients
          let ambulance_per_year = this.ambulance_per_year
          let staff_info = this.staff_info
          let fulltime_doctor_info = this.fulltime_doctor_info
          let parttime_doctor_info = this.parttime_doctor_info
          let equip_info = this.equip_info
          let director_name = this.director_name
          let director_history = this.director_history
          let has_dormitory = this.has_dormitory
          let has_nursery = this.has_nursery
          let prescription_kind = this.prescription_kind
          let avarage_prescription_number = this.avarage_prescription_number
          let visiting_area = this.visiting_area
          let target_age = this.target_age
          let capacity = this.capacity
          let images = this.images
  
  
          let facilityData = {     
            facility_category_id,
            establish_year,
            establish_month,
            establish_day,
            name, 
            name_kana,
            service_types, 
            zip,
            prefecture_id,
            city_id,
            street_address,
            lat,
            lng,
            building,
            question_1,
            question_2,
            question_3,
            question_4,
            question_5,
            question_6,
            access,
            number_of_beds,
            emergency_designation,
            open_time,
            holiday,
            average_patients,
            ambulance_per_year,
            staff_info,
            fulltime_doctor_info,
            parttime_doctor_info,
            equip_info,
            director_name,
            director_history,
            has_dormitory,
            has_nursery,
            prescription_kind,
            avarage_prescription_number,
            visiting_area,
            target_age,
            capacity,
            images
          };

          return facilityData;
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
        submitUseImages(){
          $('.loading-data').show();
          if(this.selected_images.length > 0)
          {
            var params = {
              resource_id : 0,
              resource_type : 'facility',
              images : this.selected_images
          }
            this.$http.patch('/employers/image',params)
            .then(res => res.json())
            .then( res => {
              $('.loading-data').hide();
              this.images = this.images.concat(res.data)
              this.clearselected()
            }).catch(res =>{
              $('.loading-data').hide();
              if (err.status == 422) {
                      this.errors = err.data.error;
                }
            });
          }
        },
        clearselected(){
          this.selected_images = []
          $('.select-image').removeClass('selected')
        },
        makeImageSelected(event,image){
          var el = event.target
          var exist_index = null;
          for(var i=0;i<this.selected_images.length;i++)
          {
            if(this.selected_images[i].id == image.id)
            {
              exist_index = i;
              break;
            }

          }
          if(exist_index != null)
          {
            this.selected_images.splice(exist_index,1);
            $('#popup-image-'+image.id).removeClass('selected')
          }
          else{
            this.selected_images.push(image)
            $('#popup-image-'+image.id).addClass('selected');
          }          
        },
        fetchPopupPhotos(){     
          this.clearselected()
          this.$http.get('/employers/image',{params : this.searchParams})
            .then(res => res.json())
            .then(res => {
            this.popup_images = res.data
            this.makePopupPagination(res.meta, res.links);
        });
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
        changePage: function changePage(page) {
          this.searchParams.page = parseInt(page);
          this.fetchPopupPhotos();
        },
        filterBy(code) {
          this.searchParams.description = "";
          this.search_description = "";
          var code = parseInt(code);
          this.searchParams.code = code;
          this.fetchPopupPhotos();
        },
        searchByKey() {
          this.searchParams.description = this.search_description;
          this.fetchPopupPhotos();
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
        },
        makePopupPagination(meta,links){
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
        getImage(id) {
          this.$http.get('/employers/'+id+'/image').then(response => {  
              this.image = response.data.image;
  
              if(this.image.description !== "" && this.image.description !== null){
                  this.word_count = this.image.description.length
              }
              
          })
        },
      },
    
});

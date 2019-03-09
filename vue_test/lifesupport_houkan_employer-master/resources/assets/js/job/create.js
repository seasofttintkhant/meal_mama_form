
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./../bootstrap');
import VueResource from 'vue-resource'

window.Vue = require('vue');
Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('drop-zone', require('../components/DropZone.vue'));

const app = new Vue({
    el : '#app',
    data : {
      feature_rows : [],
      feature_list : [],
      errors : [],
      showbody : false  ,
      showtitle : false,
      job_category_id : "",
      job_category_name : "",
      job_title : "",
      appeal_title : "",
      appeal_body : "",
      job_content : "",
      employment_type : 1,
      job_offer_salary_regular_min : "",
      job_offer_salary_regular_max : "",
      job_offer_salary_contract_min : "",
      job_offer_salary_contract_max : "",
      job_offer_salary_part_min : "",
      job_offer_salary_part_max : "",
      salary_etc : "",
      welfare_programs : "",
      office_hours_conditions : "",
      holiday : "",
      special_holiday : "",
      position_requirement : "",
      desired_requirement : "",
      selection_process : "",
      feature_category_1 : [],
      feature_category_2 : [],
      feature_category_3 : [],
      feature_category_4 : [],
      feature_category_5 : [],
      feature_category_6 : [],
      feature_category_7 : [],
      feature_category_8 : [],
      feature_category_9 : [],
      feature_category_10 : [],
      feature_category_11 : [],
      feature_category_12 : [],
      feature_category_13 : [],
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
      recruitment_fee_full_contract : [],
      recruitment_fee_part : [],
      job_recruitment_fee_full_contract : "",
      job_recruitment_fee_part : ""
    },
    created(){
        this.selection_process = '[1] 訪看ジョブの応募フォームよりご応募ください\r\n'       
        this.selection_process += '↓\r\n'       
        this.selection_process += '[2] 採用担当より面接日程の調整などの連絡をさせていただきます\r\n'       
        this.selection_process += '↓\r\n'       
        this.selection_process += '[3] 面接実施\r\n'       
        this.selection_process += '↓\r\n'       
        this.selection_process += '[4] 採用決定のご連絡\r\n'       
        this.selection_process += '↓\r\n'       
        this.selection_process += '[5] 入職手続きを進めつつ、訪看ジョブから祝い金をご申請ください\r\n'       
        this.selection_process += '※応募から内定までは平均1週間～1ヶ月ほどになります。\r\n'       
        this.selection_process += '※在職中で今すぐ転職が難しい方も調整のご相談が可能です。\r\n'       
        this.selection_process += '※事前の職場見学可能です。\r\n'  
        this.$on('updateImagesAttribute', function(image) {
            this.images.push(image)
          }); 
    },
    methods : {
      getFeatures(id){

        if(id !== ""){
          fetch('/get/'+ id +'/features/')
          .then(res => res.json())
          .then(res => {
            var features = res.features;
            var featuresArr = {};
            for(var i=0;i < features.length;i++){
              var id = features[i]['id']
              if(id){
                featuresArr[id]= this.makeRowsAndColumn(features[i].features);
              }
              
            }
            this.feature_rows =featuresArr;
            this.showbody = true;

          });
        }else{
          this.showbody = false;
        }
        this.getRecruitmentFee()
      },
      showTitleField(){
        this.showtitle=true     
      },
      makeRowsAndColumn(obj){
        var arrData = [];
        //To Array Temporarily 
        arrData =Object.values(obj)
        var rows =Math.ceil(arrData.length / 3);

        var rows_data = {};
        
   
          for(var a=0; a < rows ; a++)
          {      
              var tempArr = [];
              tempArr = arrData.slice(0, 3);
              rows_data[a]=Object.assign({}, tempArr); ;  
              arrData.splice(0,3);            
          }
        
        
        return rows_data;
      },
      getSubmitParams(status)
      {
        let job_status = status
        let job_category_id = this.job_category_id
        let job_title = this.job_title
        let appeal_title = this.appeal_title
        let appeal_body = this.appeal_body
        let facility_id = $('#facility_id').val();
        let job_content = this.job_content
        let employment_type = this.employment_type
        let job_offer_salary_regular_min = this.job_offer_salary_regular_min
        let job_offer_salary_regular_max = this.job_offer_salary_regular_max
        let job_offer_salary_contract_min = this.job_offer_salary_contract_min
        let job_offer_salary_contract_max = this.job_offer_salary_contract_max
        let job_offer_salary_part_min = this.job_offer_salary_part_min
        let job_offer_salary_part_max = this.job_offer_salary_part_max
        let salary_etc = this.salary_etc
        let welfare_programs = this.welfare_programs
        let office_hours_conditions = this.office_hours_conditions
        let holiday = this.holiday
        let special_holiday = this.special_holiday
        let position_requirement = this.position_requirement
        let desired_requirement = this.desired_requirement
        let selection_process = this.selection_process
        let feature_category_1 = this.feature_category_1
        let feature_category_2 = this.feature_category_2
        let feature_category_3 = this.feature_category_3
        let feature_category_4 = this.feature_category_4
        let feature_category_5 = this.feature_category_5
        let feature_category_6 = this.feature_category_6
        let feature_category_7 = this.feature_category_7
        let feature_category_8 = this.feature_category_8
        let feature_category_9 = this.feature_category_9
        let feature_category_10 = this.feature_category_10
        let feature_category_11 = this.feature_category_11
        let feature_category_12 = this.feature_category_12
        let feature_category_13 = this.feature_category_13
        let images = this.images
        let job_recruitment_fee_full_contract = this.job_recruitment_fee_full_contract
        let job_recruitment_fee_part = this.job_recruitment_fee_part
        if(job_title == "")
        {
          job_title = $('#job_category_id option:selected').text();
        }
        let jobData = {
          facility_id,
          job_category_id,
          job_title,
          appeal_title,
          appeal_body,
          job_status, 
          job_content,
          employment_type,
          job_offer_salary_regular_min,
          job_offer_salary_regular_max,
          job_offer_salary_contract_min,
          job_offer_salary_contract_max,
          job_offer_salary_part_min,
          job_offer_salary_part_max,
          salary_etc,
          welfare_programs,
          office_hours_conditions,
          holiday,
          special_holiday,
          position_requirement,
          desired_requirement,
          selection_process,
          feature_category_1,
          feature_category_2,
          feature_category_3,
          feature_category_4,
          feature_category_5,
          feature_category_6,
          feature_category_7,
          feature_category_8,
          feature_category_9,
          feature_category_10,
          feature_category_11,
          feature_category_12,
          feature_category_13,
          images,
          job_recruitment_fee_full_contract,
          job_recruitment_fee_part
        }
        return jobData;
      },
      handleSubmit(job_status){
        $('.h-popup-container').css({top:document.documentElement.scrollTop + 100});
        $('.loading-data').show();
          var status = job_status
          var data =this.getSubmitParams(status);
          this.$http.post('/jobs',data).then(response => {	
              window.location.href  ="/facilities"
          }).catch(err =>{ 
            
            $('.loading-data').hide();
            if (err.status == 422) {
                    this.errors = err.data.error;   
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
      submitUseImages(){
        $('.loading-data').show();
        if(this.selected_images.length > 0)
        {
          var params = {
            resource_id : 0,
            resource_type : 'job',
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
      preview(){
        var data = this.getSubmitParams();
        var form = document.createElement("form");
        
        form.setAttribute("action",'https://houkanjob.com/jobs/preview');
        form.setAttribute("method",'post');
        form.setAttribute("id",'temp');
        form.setAttribute("target",'_blank');
        for (var i in data) {
          if (data.hasOwnProperty(i)) {
              var input = document.createElement('input');
              input.type = 'hidden';
              input.name = i;
              if(Array.isArray(data[i]))
              {
                if(!this.isEmpty(data[i])){
                  data[i] = JSON.stringify(Object.values(data[i]));
                }
               
              }
              input.value = data[i];
              form.appendChild(input);
          }
      }
      document.body.appendChild(form);
      form.submit();
      form.remove();

      },
      isEmpty(obj) {
        for(var key in obj) {
            if(obj.hasOwnProperty(key))
                return false;
        }
        return true;
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
      getRecruitmentFee(){
        this.$http.get('/api/get_job_category?job_category_id='+this.job_category_id)
        .then(res => res.json())
        .then(res => {  
          var job_category = res.job_category;

          if(job_category != "" && job_category != null)
          {
            this.job_category_name = job_category.name
            var recruitment_fee_1 = (job_category.recruitment_fee_1 != "" && job_category.recruitment_fee_1 != null) ? job_category.recruitment_fee_1 : 0;
            var recruitment_fee_2 = (job_category.recruitment_fee_2 != "" && job_category.recruitment_fee_2 != null) ? job_category.recruitment_fee_2 : 0;
            var recruitment_fee_3 = (job_category.recruitment_fee_3 != "" && job_category.recruitment_fee_3 != null) ? job_category.recruitment_fee_3 : 0;
            var recruitment_fee_4 = (job_category.recruitment_fee_4 != "" && job_category.recruitment_fee_4 != null) ? job_category.recruitment_fee_4 : 0;

            var recruitment_fee_full_contract = [];
            var recruitment_fee_part = [];

            for(var i = recruitment_fee_1; i <= recruitment_fee_2 ; i=i+10000)
            {
              recruitment_fee_full_contract.push(i);
            }
            for(var i = recruitment_fee_3; i <= recruitment_fee_4 ; i=i+5000)
            {
              recruitment_fee_part.push(i);
            }
            this.job_recruitment_fee_full_contract = recruitment_fee_1 //Minimunm
            this.job_recruitment_fee_part = recruitment_fee_3 //Minimunm
            this.recruitment_fee_full_contract = recruitment_fee_full_contract
            this.recruitment_fee_part = recruitment_fee_part
                
          }
          
      })
      },
    }
});

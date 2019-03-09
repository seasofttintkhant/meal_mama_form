<div class="modal fade" id="fill-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-min-height">
            <div class="modal-header">
                <div class="c-m-page-header__title">
                  <h1 class="c-m-heading m-fw-bold">求人を選択</h1>
                </div>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
             <ul class="c-m-bordered-list">
              <li class="c-m-bordered-list__item" v-for="job_option in job_options" @click="showMessageOptions(job_option.id)" data-dismiss="modal">
                <a class="c-m-box-link"><span class="c-m-text c-m-text--black m-fw-bold m-fs-sm">@{{job_option.name}}</span></a>
              </li>
            </ul>
            </div>
            
        </div>
    </div>
  </div>
 
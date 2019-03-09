<div class="make-scrollable page-popup-style-1-container" id="fill-popup">
  <div class="page-popup-style-1">
    <div class="page-popup-style-1-header">
      <h3>求人を選択</h3>
      <span class="search-popup-dismiss" data-popup_close="#fill-popup">&times;</span>
    </div>
    <div class="search-popup-container no-popup-container-style">
      <div class="search-popup-body">
        <ul class="c-m-bordered-list list-bdr">
          <li class="c-m-bordered-list__item" v-for="job_option in job_options" @click="showMessageOptions(job_option.id)" data-popup_close="#fill-popup">
            <a class="c-m-box-link"><span class="c-m-text c-m-text--black m-fw-bold m-fs-sm">@{{job_option.name}}</span></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

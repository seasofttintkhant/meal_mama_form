<div class="make-scrollable page-popup-style-1-container" id="job-popup">
  <div class="page-popup-style-1">
    <div class="page-popup-style-1-header">
      <h3>求人を選択</h3>
      <span class="search-popup-dismiss" data-popup_close = "#job-popup">&times;</span>
    </div>
    <div class="search-popup-container no-popup-container-style">
      <div class="search-popup-body">
        <ul class="c-m-bordered-list list-bdr">
          <li class="c-m-bordered-list__item" v-for="match_job_opening in match_job_openings">
            <a class="c-m-box-link" @click="getJobSeekers(match_job_opening.job_category_id)" data-popup_close = "#job-popup"><span class="c-m-text c-m-text--black m-fw-bold m-fs-sm">@{{match_job_opening.name}}</span></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

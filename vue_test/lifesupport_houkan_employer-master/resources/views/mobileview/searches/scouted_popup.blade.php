<div class="make-scrollable page-popup-style-1-container" id="scouted-popup">
  <div class="page-popup-style-1">
    <div class="page-popup-style-1-header">
      <h3>「気になる」した求職者</h3>
      <span class="search-popup-dismiss" data-popup_close = "#scouted-popup">&times;</span>
    </div>
    <div class="search-popup-container no-popup-container-style">
      <div class="search-popup-body">
        <ul class="c-m-bordered-list list-bdr">
          <li class="c-m-bordered-list__item" v-for="scouted_job in scouted_jobs" data-popup_close="#scouted-popup">
            <a class="c-m-box-link"><span class="c-m-text c-m-text--black m-fw-bold m-fs-sm" @click="getScoutedJobSeekers(scouted_job.id)">@{{scouted_job.name}} @{{scouted_job.prefecture_name}}</span></a>
          </li> 
        </ul>
      </div>
    </div>
  </div>
</div>

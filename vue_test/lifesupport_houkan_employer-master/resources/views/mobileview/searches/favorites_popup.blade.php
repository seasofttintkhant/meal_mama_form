<div class="make-scrollable page-popup-style-1-container" id="favorites-popup">
  <div class="page-popup-style-1">
    <div class="page-popup-style-1-header">
      <h3>「気になる」した求職者</h3>
      <span class="search-popup-dismiss" data-popup_close = "#favorites-popup">&times;</span>
    </div>
    <div class="search-popup-container no-popup-container-style">
      <div class="search-popup-body">
        <ul class="c-m-bordered-list list-bdr">
          <li class="c-m-bordered-list__item" v-for="favorited_job in favorited_jobs" data-popup_close="#favorites-popup">
            <a class="c-m-box-link"><span class="c-m-text c-m-text--black m-fw-bold m-fs-sm" @click="getFavoritedJobSeekers(favorited_job.id)">@{{favorited_job.name}} @{{favorited_job.prefecture_name}}</span></a>
          </li> 
        </ul>
      </div>
    </div>
  </div>
</div>

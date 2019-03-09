<div class="modal fade" id="announcement-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="c-m-page-header__title">
                  <h1 class="c-m-heading m-fw-bold">@{{announcement_title}}</h1>

                </div>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="c-m-box">
                <span class="c-m-text c-m-text--grey m-fw-bold c-m-text--helvetica c-m-text--s-short">@{{announcement_date}}</span>
                <div class="m-pd-top-md">
                  <div class="m-fs-md c-m-text s-announcement"  v-html="announcement_body">
                  </div>
                </div>
              </div>
            </div>
            </div>
            
        </div>
    </div>
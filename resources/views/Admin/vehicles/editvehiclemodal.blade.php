<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
data-keyboard ="false" data-backdrop = "static">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit vehicle</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data" id="form">
                  @csrf
                    <div class="form-group">
                        <label for="">Vehicle image</label>
                        <input type="file" name="vehicle_image" class="form-control">
                        <span class="text-danger error-text vehicle_image_error"></span>
                    </div>
                    <div class="img-holder"></div>
                    <button type="submit" class="btn btn-primary">Save vehicle</button>
                </form>
            </div>
        </div>

        </div>
      </div>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Yakin Untuk Menghapus data ?
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="/delete/{{$d->id}}" class="btn btn-danger btn-icon-split">
          <span class="icon text-white-50">
              <i class="fas fa-trash"></i>
          </span>
          <span class="text">Hapus</span>
      </a>
        </div>
      </div>
    </div>
  </div>
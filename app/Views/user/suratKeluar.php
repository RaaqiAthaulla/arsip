<?= $this->extend('layouts/templete/userTemplate'); ?>
<?= $this->section('Content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Surat Keluar</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">

      <div class="col mb-3">
        <button type="button" class="btn btn-info" onclick="refresh()"><i class="bi bi-arrow-clockwise">REFRESH</i></button>
        <button type="button" class="btn btn-success" id="btnAdd" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="bi bi-box-arrow-cross">ADD NEW</i></button>
        <button type="button" class="btn btn-warning" id="btnEdit" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="bi bi-box-arrow-down">EDIT</i></button>
        <button type="button" class="btn btn-danger" id="btnReject"><i class="bi bi-x-lg">REJECT</i></button>
      </div>

      <div class="cols-auto">
        <div class="card overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Data Surat Keluar</h5>

            <table id="tableNew" class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor</th>
                  <th>Disposisi</th>
                  <th>Keperluan</th>
                  <th>Keterangan</th>
                  <th>Penerima</th>
                  <th>Tanggal</th>
                  <th>Kategori</th>
                  <th>Status</th>
                </tr>
              </thead>
            </table>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Modal Add -->
  <div class="modal fade" id="modalAdd" data-bs-keyboard="false" tabindex="-1" aria-labelledby="troubleshootLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editLabel">Form Tambah</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="row g-3 mt-1 mx-3 needs-validation" id="formTambah" novalidate>
          <div class="col-12">
            <label for="Nomer" class="form-label">Nomer</label>
            <input type="text" class="form-control " id="Nomer">
          </div>
          <div class="col-12">
            <label for="ditujukan" class="form-label">Disposisi</label>
            <input type="text" class="form-control " id="ditujukan">
          </div>
          <div class="col-12">
            <label for="Keperluan" class="form-label">Keperluan</label>
            <input type="text" autofocus class="form-control " id="Keperluan">
          </div>
          <div class="col-12">
            <label for="Keterangan" class="form-label">Keterangan</label>
            <input type="text" autofocus class="form-control " id="Keterangan">
          </div>
          <div class="col-12">
            <label for="penerima" class="form-label">Penerima</label>
            <input type="text" class="form-control" id="Penerima">
          </div>
          <div class="col-12">
            <label for="Tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="Tanggal">
          </div>
          <div class="col-12">
            <label for="Kategori" class="form-label">Kategori</label>
            <select class="form-select" aria-label="Default select example" id="addKategori">
              <!-- ajax -->
            </select>
          </div>

          <div class="text-center mb-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="AddSurat" onclick="insert()">Submit</button>
          </div>
        </form>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="xCloseTroubleshoot">Close</button>
        </div> -->
      </div>
    </div>
  </div>
  <!-- End Modal Edit -->

  <!-- Modal Edit -->
  <div class="modal fade" id="modalEdit" data-bs-keyboard="false" tabindex="-1" aria-labelledby="troubleshootLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editLabel">Form Edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="row g-3 mt-1 mx-3 needs-validation" id="formEdit" novalidate>
          <div class="col-12">
            <label for="editNomer" class="form-label">Nomer</label>
            <input type="text" class="form-control " id="editNomer">
          </div>
          <div class="col-12">
            <label for="editditujukan" class="form-label">Disposisi</label>
            <input type="text" class="form-control" id="editDitujukan">
          </div>
          <div class="col-12">
            <label for="editKeperluan" class="form-label">Keperluan</label>
            <input type="text" autofocus class="form-control " id="editKeperluan">
          </div>
          <div class="col-12">
            <label for="editKeterangan" class="form-label">Keterangan</label>
            <input type="text" autofocus class="form-control " id="editKeterangan">
          </div>
          <div class="col-12">
            <label for="editpenerima" class="form-label">Penerima</label>
            <input type="text" class="form-control " id="editPenerima">
          </div>
          <div class="col-12">
            <label for="editTanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="editTanggal">
          </div>
          <div class="col-12">
            <label for="editKategori" class="form-label">Kategori</label>
            <select class="form-select" aria-label="Default select example" id="editKategori">
              <!-- ajax -->
            </select>
          </div>

          <div class="text-center mb-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="editSurat">Submit</button>
          </div>
        </form>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="xCloseTroubleshoot">Close</button>
        </div> -->
      </div>
    </div>
  </div>
  <!-- End Modal Edit -->
</main><!-- End #main -->

<?= $this->endSection(); ?>
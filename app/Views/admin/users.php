<?= $this->extend('layouts/templete/template'); ?>
<?= $this->section('Content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Users</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">

      <div class="mb-3">
        <button type="button" class="btn btn-info" onclick="refresh()"><i class="bi bi-arrow-clockwise">REFRESH</i></button>
        <button type="button" class="btn btn-warning" id="btnEdit"><i class="bi bi-pencil">EDIT</i></button>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bi bi-plus">NEW</i></button>
      </div>

      <div class="cols-auto">
        <div class="card overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Data Users</h5>
            <table id="tableUsers" class="table datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Kode Guru</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Status ASN</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Status Aktif</th>
                  <!-- <th>Role</th> -->
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<!-- Add User Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <form class="row g-3" id="formAdd">
              <div class="col-md-12">
                <label for="kodeGuru" class="form-label">Kode Guru</label>
                <input type="text" id="kodeGuru" class="form-control">
              </div>
              <div class="col-md-12">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" id="nama" class="form-control">
              </div>
              <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" class="form-control">
              </div>
              <div class="col-md-12">
                <label for="statusASN" class="form-label">Status ASN</label>
                <select id="statusASN" class="form-select">
                  <option selected>Pilih Status ASN</option>
                  <option value="1">ASN</option>
                  <option value="2">BuKAN ASN</option>
                </select>
              </div>
              <div class="col-md-12">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" class="form-control">
              </div>
              <div class="col-md-12">
                <label for="password" class="form-label">Password</label>
                <input type="text" id="password" class="form-control">
              </div>
               <div>
                  <input type="hidden" class="form-control" id="role" name="role" value="staff" disabled>
               </div>
              <div class="text-center mt-3">
                <button class="btn btn-secondary" type="Reset">Reset</button>
                <button class="btn btn-primary" type="button" onclick="insert()">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Add User Modal -->

<!-- Edit User Modal -->
<div class="modal fade" id="editUser" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User Modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit User</h5>
            <form class="row g-3" id="formEdit">
              <div class="col-md-12">
                <label for="Id" class="form-label">ID</label>
                <input type="text" class="form-control" id="editId" disabled>
              </div>
              <div class="col-md-12">
                <label for="kodeGuru" class="form-label">Kode Guru</label>
                <input type="text" class="form-control" id="editKodeGuru" disabled>
              </div>
              <div class="col-md-12">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="editNama" disabled>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="editEmail">
              </div> 
              <div class="col-md-12">
                <label for="Status_asn" class="form-label">Status ASN</label>
                <select id="editStatus_asn" class="form-select">
                  <option selected>Pilih Status ASN</option>
                  <option value="1">ASN</option>
                  <option value="2">BuKAN ASN</option>
                </select>
              </div>
             
              <div class="col-md-12">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="editUsername" disabled>
              </div>
              <div class="col-md-12">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="editPassword">
              </div>
              <div class="col-md-12">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="status_aktif" />
                  <label class="form-check-label" for="status_aktif">Inactive switch</label>
                </div>
              </div>
              <div class="text-center">
                <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="edit()">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>
<!-- End Edit User Modal -->

<?= $this->endSection(); ?>
<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <?php 
          if($this->session->userdata('hold')=="A"){
            ?>

        <li class="header">Super Admin Menu</li>
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-circle-o"></i> Dashboard</a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Sekolah</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>sekolah"><i class="fa fa-circle-o"></i> Sekolah</a></li>
            <li><a href="<?php echo base_url(); ?>sekolah/sekolah"><i class="fa fa-circle-o"></i> Manajemen Sekolah</a></li>
          </ul>
        </li>
        <?php
          }
         ?>
        <?php 
          if($this->session->userdata('hold')=="AS"){
            ?>

        <li class="header">Admin Menu</li>
        <li><a href="<?php echo base_url();?>home"><i class="fa fa-circle-o"></i> Home</a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Siswa</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>siswa"><i class="fa fa-circle-o"></i> Siswa</a></li>
            <li><a href="<?php echo base_url(); ?>siswa/siswa"><i class="fa fa-circle-o"></i> Manajemen Siswa</a></li>
            <li><a href="<?php echo base_url(); ?>siswa/belajar"><i class="fa fa-circle-o"></i> Kelas Belajar Siswa</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Pegawai</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>pegawai"><i class="fa fa-circle-o"></i> Pegawai</a></li>
            <li><a href="<?php echo base_url(); ?>pegawai/pengajar"><i class="fa fa-circle-o"></i> Pengajar Mapel</a></li>
            <li><a href="<?php echo base_url(); ?>pegawai/jabatan"><i class="fa fa-circle-o"></i> Jabatan Pegawai</a></li>
            <li><a href="<?php echo base_url(); ?>pegawai/pegawai"><i class="fa fa-circle-o"></i> Manajemen Pegawai</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i>
             <span>Kelas</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>kelas"><i class="fa fa-circle-o"></i> Kelas</a></li>
            <li><a href="<?php echo base_url(); ?>kelas/kelas"><i class="fa fa-circle-o"></i> Manajemen Kelas</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Jurusan</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>jurusan/bidang_ahli"><i class="fa fa-circle-o"></i> Bidang Keahlian</a></li>
            <li><a href="<?php echo base_url(); ?>jurusan/program_ahli"><i class="fa fa-circle-o"></i> Program Keahlian</a></li>
            <li><a href="<?php echo base_url(); ?>jurusan/paket_ahli"><i class="fa fa-circle-o"></i> Paket Keahlian</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Mata Pelajaran</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>mapel"><i class="fa fa-circle-o"></i> Mapel</a></li>
            <li><a href="<?php echo base_url(); ?>mapel/mapel"><i class="fa fa-circle-o"></i> Manajemen Mapel</a></li>
            <li><a href="<?php echo base_url(); ?>mapel/sk"><i class="fa fa-circle-o"></i> Standar Kompetensi</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Ekstrakurikuler</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>ekstra"><i class="fa fa-circle-o"></i> Ekstrakulikuler</a></li>
            <li><a href="<?php echo base_url(); ?>ekstra/data_ekstra"><i class="fa fa-circle-o"></i> Data Ekstrakulikuler</a></li>
          </ul>
        </li>
        
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      <?php
          }
          if($this->session->userdata('hold')=="P"){
            ?>
            <li><a href="<?php echo base_url();?>home"><i class="fa fa-circle-o"></i> Home</a></li>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i>
             <span>Kelas & Input Nilai</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <?php
              if(in_array("guru",$this->session->userdata('jabatan'))){
               ?>
                <li><a href="<?php echo base_url(); ?>user"><i class="fa fa-circle-o"></i> Kelas Ajar</a></li>
               <?php
              }
            ?>   
            <?php  
            if(in_array("wali",$this->session->userdata('jabatan'))){
              ?>
               <li><a href="<?php echo base_url(); ?>user"><i class="fa fa-circle-o"></i> Perwalian</a></li>
              <?php
            } ?>  
            <?php 
            if(in_array("bk",$this->session->userdata('jabatan'))){
              ?>
               <li><a href="<?php echo base_url(); ?>user"><i class="fa fa-circle-o"></i> Bimbingan Konseling</a></li>
              <?php
            } ?> 
          
          </ul>
        </li>
            <?php
          }
         ?>
      </ul>
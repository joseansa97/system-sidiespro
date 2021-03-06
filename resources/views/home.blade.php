@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Dashboard / </strong> {{ $saludo }}</div>

                <div class="card-body">
                    <div class="container">
                        <!-- Main content -->
                        <section class="content">
                          <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                    
                              <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                  <div class="inner">
                                    <h3>150</h3>
                                    <p>Ing. Civil</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-bag"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                              </div>
                    
                              <!-- ./col -->
                              <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                  <div class="inner">
                                    <h3>160</h3>
                                    <p>Lic. Administración</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                              </div>
                    
                              <!-- ./col -->
                              <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-orange">
                                  <div class="inner">
                                    <h3>88</h3>
                    
                                    <p>Ing. Industrial</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                              </div>
                    
                              <!-- ./col -->
                              <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                  <div class="inner">
                                    <h3>65</h3>
                                    <p>Ing. Mecatronica</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                              </div>
                              <!-- ./col -->
                    
                              <!-- ./col -->
                              <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-olive">
                                  <div class="inner">
                                    <h3>130</h3>
                                    <p>Ing. Gestion Empresarial</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                              </div>
                              <!-- ./col -->
                    
                              <!-- ./col -->
                              <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-navy">
                                  <div class="inner">
                                    <h3>90</h3>
                                    <p>Ing. Sistemas Computacionales</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                              </div>
                              <!-- ./col -->
                    
                            </div>
                            <!-- /.row -->
                    
                            
                          </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

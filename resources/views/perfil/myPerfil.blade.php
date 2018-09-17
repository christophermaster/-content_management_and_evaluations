@extends('layouts.admin') @section('contenido')
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                      <div class="card-header card-header-warning card-header-icon">
                          <div class="card-icon">
                              <i class="material-icons">weekend</i>
                          </div>
                          <p class="card-category">Bookings</p>
                          <h3 class="card-title">184</h3>
                      </div>
                      <div class="card-footer">
                          <div class="stats">
                              <i class="material-icons text-danger">warning</i>
                              <a href="#pablo">Get More Space...</a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                      <div class="card-header card-header-rose card-header-icon">
                          <div class="card-icon">
                              <i class="material-icons">equalizer</i>
                          </div>
                          <p class="card-category">Website Visits</p>
                          <h3 class="card-title">75.521</h3>
                      </div>
                      <div class="card-footer">
                          <div class="stats">
                              <i class="material-icons">local_offer</i> Tracked from Google Analytics
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                      <div class="card-header card-header-success card-header-icon">
                          <div class="card-icon">
                              <i class="material-icons">store</i>
                          </div>
                          <p class="card-category">Revenue</p>
                          <h3 class="card-title">$34,245</h3>
                      </div>
                      <div class="card-footer">
                          <div class="stats">
                              <i class="material-icons">date_range</i> Last 24 Hours
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                      <div class="card-header card-header-info card-header-icon">
                          <div class="card-icon">
                              <i class="fa fa-twitter"></i>
                          </div>
                          <p class="card-category">Followers</p>
                          <h3 class="card-title">+245</h3>
                      </div>
                      <div class="card-footer">
                          <div class="stats">
                              <i class="material-icons">update</i> Just Updated
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-4">
                  <div class="card card-profile">
                      <div class="card-avatar">
                          <a href="#pablo">
                              <img class="img" src="{{asset('img/faces/avatar.jpg')}}" />
                          </a>
                      </div>
                      <div class="card-body">
                          <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                          <h4 class="card-title">Alec Thompson</h4>
                          <p class="card-description">
                              Don't be scared of the truth because we need to restart the human foundation in truth And I
                              love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                          </p>
                          <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header card-header-icon card-header-primary">
                          <div class="card-icon">
                              <i class="material-icons">perm_identity</i>
                          </div>
                          <h4 class="card-title">Edit Profile -
                              <small class="category">Complete your profile</small>
                          </h4>
                      </div>
                      <div class="card-body">
                          <form>
                              <div class="row">
                                  <div class="col-md-5">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Company (disabled)</label>
                                          <input type="text" class="form-control" disabled>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Username</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Email address</label>
                                          <input type="email" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Fist Name</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Last Name</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Adress</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">City</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Country</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Postal Code</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>About Me</label>
                                          <div class="form-group">
                                              <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so
                                                  thirsty, I'm in that two seat Lambo.</label>
                                              <textarea class="form-control" rows="5"></textarea>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                              <div class="clearfix"></div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
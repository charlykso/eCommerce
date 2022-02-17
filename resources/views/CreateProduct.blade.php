<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<div class="container">
    <div class="row vertical-center-row">
        <div class="col-sm-6 offset-sm-3 ">
            <div class="central">
                <h4 class="text-center">Create Product</h4>
                <form method="POST" action="{{ url('product/upload')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" name="Pname" required="required" class="form-control"  placeholder="Enter product name">
                        <small id="emailHelp" class="form-text text-muted"></small>
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Price</label>
                        <input type="number" name="price" required="required" class="form-control "  placeholder="Enter price e.g 1000">
                        <small id="emailHelp" class="form-text text-muted"></small>
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Description</label>
                        <input type="text" name="description" required="required" class="form-control" placeholder="Enter product description">
                        <small id="emailHelp" class="form-text text-muted"></small>
                        
                    </div>
                    <div class="form-group">
                        <label for="category">Product Category</label>
                        <input type="text" name="category" required="required" class="form-control" placeholder="Enter product category eg mobile, television etc">
                        <small id="category" class="form-text text-muted"></small>
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Picture</label>
                        <input type="file" name="picture" required="required" class="form-control" >
                        <small id="emailHelp" class="form-text text-muted"></small>
                        
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <button type="reset" class="btn btn-default">Clear</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
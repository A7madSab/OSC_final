<div class="col-lg-3 ">
                <!--global search-->
                <div class="search2 ">
                      <form method="POST" action='/seach'>
                        <div class="form-group">
                            {{csrf_field()}}
                            <input class="form-control" type="text" placeholder="search" name="searchval">
                            <button type="submit" class="btn btn-danger btn-lg ">Go!</button>
                        </div>
                        
                    </form>
                </div>
                <!---end global search-->
                <!--start side bar-->
                <div class="sidebar text-center">
                    <h3>category</h3>
                    <div class="style"></div>
                    <ul class="list-unstyled">

                        @foreach($cats as $cat)
                        <li><a href="/searchcat/{{$cat->category_Name}}"><i class="fas fa-chalkboard"></i>&nbsp;{{$cat->category_Name}}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>

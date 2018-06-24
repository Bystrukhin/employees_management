<div class="footer_top">
    <div class="row">
        <form action="{{route('admin.request-search')}}" method="get">
            <div class="btn-group">
                <a href="#" class="btn btn-primary">By date</a>
                <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                <ul class="dropdown-menu" style="padding: 10px" id="myDiv">
                    <li><p><input type="radio" value="asc" style="margin-right: 10px;" name="date">Oldest</p></li>
                    <li><p><input type="radio" value="desc" style="margin-right: 10px;" name="date">Newest</p></li>
                </ul>
            </div>
            <div class="btn-group">
                <a href="#" class="btn btn-primary">By decision</a>
                <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                <ul class="dropdown-menu" style="padding: 10px" id="myDiv">
                    <li><p><input type="radio" value="declined" style="margin-right: 10px;" name="decision">Declined</p></li>
                    <li><p><input type="radio" value="approved" style="margin-right: 10px;" name="decision">Approved</p></li>
                </ul>
            </div>
            <div class="btn-group">
                <a href="#" class="btn btn-primary">By status</a>
                <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                <ul class="dropdown-menu" style="padding: 10px" id="myDiv">
                    <li><p><input type="radio" value="waiting" style="margin-right: 10px;" name="status">Waiting for decision</p></li>
                    <li><p><input type="radio" value="processed" style="margin-right: 10px;" name="status">Processed</p></li>
                </ul>
            </div>
            <input class="btn btn-primary" type="submit" value="Search">
        </form>
    </div>
</div>
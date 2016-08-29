<script type="text/javascript" src="/js/jquery.smartmenus.js"></script>
<link rel='stylesheet' type='text/css' href='/css/sm-blue/sm-blue.css'>
<div>
    <ul id="main-menu" class="sm sm-blue sm-vertical">
        <li><a href="#">Item 1</a></li>
        <li><a href="#">Item 2</a>
            <ul>
                <li><a href="#">Item 2-1</a></li>
                <li><a href="#">Item 2-2</a></li>
                <li><a href="#">Item 2-3</a></li>
            </ul>
        </li>
        <li><a href="#">Item 3</a></li>
    </ul>
    <script>
        $(function () {
            $('#main-menu').smartmenus();
        });
    </script>
</div>
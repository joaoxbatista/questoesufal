<!DOCTYPE html>
<head>

<style>
  header{
    text-align: center;
  }

  header .img{
    display: inline-block;
  }

  ul{
    list-style: none;
  }
</style>
</head>
<body>
    <header>
      <img src="{{ asset('imgs/ufal_logo_g.png')}}" width="80px">
      <h3>UNIVERSIDADE FEDERAL DE ALAGOAS CAMPUSA ARAPIRACA</h3>

    </header>
		@yield('content')

</body>
</html>

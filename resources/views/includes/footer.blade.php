<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="https://wa.me/6281290992680">Ky-Project</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
  <script src="{{ asset('back/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('back/modules/popper.js') }}"></script>
  <script src="{{ asset('back/modules/tooltip.js') }}"></script>
  <script src="{{ asset('back/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('back/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('back/modules/moment.min.js') }}"></script>
  <script src="{{ asset('back/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>
  

  <!-- Page Specific JS File -->
  <script>
    $(document).ready(function() {
        $('#toggle-password').click(function() {
            var password = $('input[name="password"]');
            var type = password.attr('type');
            if (type === 'password') {
                password.attr('type', 'text');
                $(this).html('<i class="fa fa-eye-slash"></i>');
            } else {
                password.attr('type', 'password');
                $(this).html('<i class="fa fa-eye"></i>');
            }
        });
    });
  </script> 

<script>
  function search() {
    let filter = document.getElementById('find').value.toUpperCase();
    let item = document.querySelectorAll('.product');
    let l = document.getElementsByTagName('h3');

    for(var i = 0;i<=l.length;i++){
      let a=item[i].getElementsByTagName('h3')[0];
      let value=a.innerHTML || a.innerText || a.textContent;
        if(value.toUpperCase().indexOf(filter) > -1) {
            item[i].style.display="";
          }
        else
        {
            item[i].style.display="none";
        }
      }
    }
</script>

  <!-- Template JS File -->
  <script src="{{ asset('back/js/scripts.js') }}"></script>
  <script src="{{ asset('back/js/custom.js') }}"></script>
  @include('sweetalert::alert')
</body>
</html>


<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!-- Bootstrap and jpopper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<!-- Datatables -->
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>

<script>
    $(document).ready(function() {

      $('#table_posts').DataTable({
        "order": [[ 0, "desc" ]]
      });

      $('#table_agendamentos').DataTable({
        "order": [[ 0, "desc" ]]
      });

      $('#table_categorias').DataTable({
        "order": [[ 0, "desc" ]]
      });
      
    } );
</script>

<script type="text/javascript">

  var date = new Date();

  //Create Variable for first day of current month
  var firstDay = new Date(date.getFullYear(), date.getMonth(), date.getDate()+1);

  //Create variable for last day of next month
  var lastDay = new Date(date.getFullYear(), date.getMonth()+1, 0);

  console.log(firstDay);

  var array = <?php echo '["' . implode('", "', $datas) . '"]' ?>; //dates to disable

  $(document).ready(function(){
    $('#dia').datepicker({
      format: 'dd/mm/yyyy',
      language: 'pt-BR',
      startDate: firstDay,
      endDate: lastDay,
      autoHide: true,
      daysOfWeekDisabled: [0,6],
      datesDisabled: array,
      todayHighlight: true,
      clearBtn: true
    }); 

  });

</script>
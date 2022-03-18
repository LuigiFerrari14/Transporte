<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset='utf-8' />
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<link href='css/bootstrap.min.css' rel='stylesheet'>
		<link href='css/fullcalendar.min.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<link href='css/personalizado.css' rel='stylesheet' />
        	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>	
		<script src='js/jquery.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='locale/pt-br.js'></script>
		<script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					defaultDate: Date(),
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					eventClick: function(event) {
						
						$('#visualizar #id').text(event.id);
                        $('#visualizar #id').val(event.id);
                        $('#visualizar #Local_saida').text(event.Local_saida);
                        $('#visualizar #title').text(event.title);
                        $('#visualizar #start').text(event.start.format('DD/MM/YYYY'));
                        $('#visualizar #Horario_saida').text(event.Horario_saida);
                        $('#visualizar #Horario_retorno').text(event.Horario_retorno);
                        $('#visualizar #Pessoas_carro').text(event.Pessoas_carro);
                        $('#visualizar #Nome').text(event.Nome);
                        $('#visualizar #Motorista').text(event.Motorista);
                        $('#visualizar').modal('show');
                        return false;
                    },



                    events: [
                        <?php
                            while($row_events = mysqli_fetch_array($resultado_events)){

                                ?>
                                {
                                id: '<?php echo $row_events['id']; ?>',
                                Local_saida: '<?php echo $row_events['Local_saida']; ?>',
                                title: '<?php echo $row_events['title']; ?>',
                                start: '<?php echo $row_events['start']; ?>',
                                Horario_saida: '<?php echo $row_events['Horario_saida']; ?>',
                                Horario_retorno: '<?php echo $row_events['Horario_retorno']; ?>',
                                Nome: '<?php echo $row_events['Pessoas_carro']; ?>',
                                Motorista: '<?php echo $row_events['Motorista']; ?>',


								},<?php
							}
						?>
					]
				});
			});


		</script>

		<style>
        
             div.col-md-8.col-lg-8{
                padding-bottom:  35px;               
                margin: -15px;
            }
            
            
            button.btn.btn-primary{
                
                height: 55px;
                width: 215px;
                font-size: 18px;
                
            }   
            a.thumbnail {
                
                border: white;
                
            }
            .table-striped {
                
                background-color: #ccc;
            } 
            
            .table-hover{
                background-color:aliceblue;
                color:dimgray;a
                
            }
            .container {
                margin-top: 50px;
                border: white;
            }
           hr.new1 {
                border-top: 1px solid gray;
                    }



        </style>

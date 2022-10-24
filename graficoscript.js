var ctx = document.getElementById('myChart');
var stars = [135850, 52122, 148825, 16939, 9763];
var frameworks = ['Usuarios', 'Quiz feito', 'Fóruns ativos', 'Chats ativos', 'Perso. salvas'];

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
		labels: frameworks,
    datasets: [{
        label: 'Controle Barbie Mais(em Q)',
        data: stars,
		backgroundColor: [
          "rgba(250,38, 218)",
          "rgba(0, 207, 224)",
          "rgba(254, 227, 25)",
          "rgba(130, 0, 195)",
          "rgba(255, 190, 245)"
        ],
        borderColor: [
          "rgba(0, 207, 224)",
          "rgba(250,38, 218)",
          "rgba(130, 0, 195)",
          "rgba(254, 227, 25)",
          "rgba(250,38, 218)"
        ],
        borderWidth: 3
		
	}]
	
	
 },
})
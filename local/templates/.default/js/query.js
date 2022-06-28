window.addEventListener("load",function(){
	document.querySelector('.buttonn').addEventListener("click", funcQuery);
});

function funcQuery()
{
	var room_length= document.querySelector("#room_length").value;
	var room_width = document.querySelector("#room_width").value;
	var board_length = document.querySelector("#board_length").value;
	var board_width = document.querySelector("#board_width").value;

	room_length = encodeURIComponent(room_length);
	room_width = encodeURIComponent(room_width);
	board_length = encodeURIComponent(board_length);
	board_width = encodeURIComponent(board_width);

	var xhr = new XMLHttpRequest();
	xhr.open('POST', '/local/templates/.default/components/bitrix/form.result.new/calculation/calc.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	xhr.onreadystatechange = function()
	{
		if (xhr.readyState === 4 && xhr.status === 200)
		{
			var ans = JSON.parse(xhr.responseText);
			
			////////////////////
			var matchs = document.querySelectorAll(".errorr");
			for (let item of matchs)
			{
				item.innerHTML = "";
			}

			var matchs = document.querySelectorAll(".inputt");
			for (let item of matchs)
			{
				if(item.classList.contains("err"))
				{
					item.classList.remove("err");
				}
			}

			document.querySelector(".result").innerHTML = "";
			////////////////////

			if (ans.not_all != undefined)
			{
				document.querySelector("#all").innerHTML = ans.not_all;
			}

			if (ans.result_mess != undefined)
			{
				document.querySelector("#all").innerHTML = ans.result_mess;
			}

			for (let item in ans)
			{
				//console.log(item);
				if (item == 'not_all' || item == 'result_mess' || item == 'result')
				{
					continue;
				}
				if (ans[item] != undefined)
				{
					document.querySelector(`p#${item}`).innerHTML = ans[item];
					document.querySelector(`input#${item}`).classList.add("err");
				}
			}

			if(ans.result != undefined)
			{
				var ready_block = '';
				ready_block=`
				<span>The minimum amount of laminate for laying: </span>
				<span class="selection">${ans.result}</span>
				<span>boards.</span>
				`;
				document.querySelector(".result").innerHTML=ready_block;
			}
		}
	}
	
	data = "room_length=" + room_length + "&room_width=" + room_width + "&board_length=" + board_length + "&board_width=" + board_width;
	xhr.send(data);
}
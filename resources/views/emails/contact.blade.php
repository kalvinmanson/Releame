<table cellpadding="0" cellspacing="0" border="0" width="850" align="center">
	<tr>
		<th><p align="center"><img src="{{ url() }}/img/logo.png"></p></th>
	</tr>
	<tr>
		<div style="padding:35px; font-family: verdana, arial;">
			<p>
				Nombre: {{ $data['name'] }}<br>
				email: {{ $data['email'] }}<br>
				Asunto: {{ $data['celphone'] }}<br>
				País: {{ $country }}<br>
				Asunto: {{ $data['subject'] }}
			</p>
			<hr>
			<p>
				{{ $data['content'] }}
			</p>
		</div>
	</tr>
</table>
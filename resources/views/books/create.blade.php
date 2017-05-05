@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Quiero vender este libro</h1>
	<div class="row">
		<div class="col-sm-8">
			<form method="POST" action="/{{ LaravelLocalization::getCurrentLocale() }}/books" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Titulo del libro</label>	
					<div class="input-group">
				      <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="ej. 20.000 Leguas de viaje submarino" required>
				      <span class="input-group-btn">
				        <label for="file_picture" class="file-lavel btn btn-default">
							<i class="fa fa-camera"></i> Agregar foto <span class="file-text"></span>
							<input type="file" name="file_picture" id="file_picture" accept="image/*" class="file_upload" style="display: none;">
						</label>
				      </span>
				    </div><!-- /input-group -->
				</div>
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group">
							<label for="author">Nombre del author</label>
							<input name="author" id="author" type="text" class="form-control" value="{{ old('author') }}" placeholder="ej. Julio Verne" required>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label for="publisher">Editorial</label>
							<input name="publisher" id="publisher" type="text" class="form-control" value="{{ old('publisher') }}" placeholder="ej. Oveja Negra" required>
							<small><a class="tr_toggle" data-target="box_collection">¿Pertenece a una colección?</a></small>
						</div>
						<div class="form-group box_collection" style="display: none;">
							<label for="collection">Colección</label>
							<input name="collection" id="collection" type="text" class="form-control" value="{{ old('collection') }}" placeholder="ej. Clásicos de la literatura">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label for="lang">Idioma</label>
							<select name="lang" id="lang" class="form-control">
								<option value="es" {{ old('lang') == "es" ? "selected" : "" }}>Español</option>
								<option value="en" {{ old('lang') == "en" ? "selected" : "" }}>Ingles</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group">
							<label for="isbn10">ISBN 10</label>
							<input type="text" name="isbn10" id="isbn10" placeholder="ej. 978-0-7334-2609-4" value="{{ old('isbn10') }}" class="form-control">
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label for="isbn13">ISBN 13</label>
							<input type="text" name="isbn13" id="isbn13" placeholder="ej. 978-0-7334-2609-4" value="{{ old('isbn13') }}" class="form-control">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label for="pages">Pags.</label>
							<input type="number" name="pages" id="pages" class="form-control" min="10" value="{{ old('pages') }}" placeholder="ej. 150" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="tags">Palabras clave.</label>
					<input type="text" name="tags" id="tags" class="form-control" placeholder="Páginas" value="{{ old('tags') }}" required>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="abstract">Resumen</label>
							<textarea name="abstract" id="abstract" class="form-control" rows="6" placeholder="Comparte un pequeño resumen del libro para que los llamar la atención de otros usuarios.">{{ old('abstract') }}</textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="description">Descripción</label>
							<textarea name="description" id="description" class="form-control" rows="6" placeholder="Danos tu opinión personal del libro, cuentanos alguna historia o anecdota personal del el.">{{ old('description') }}</textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-7">
						<p>Recuerda que Relea.me es una plataforma para fomenar el intercambio de libros usados, considera el estado del libro que estas vendiendo para que otros usuarios puedan acceder facilmente a el y compartir lo especial de la lectura.</p>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label for="price">Precio</label>
							<div class="input-group">
							  <span class="input-group-addon">$ USD</span>
							  <input type="number" name="price" id="price" min="1" max="50" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="ej. 5" value="{{ old('price') }}" required>
							  <span class="input-group-addon">.00</span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					{{ csrf_field() }}
					<button type="submit" class="btn btn-primary">Agregar Libro</button>
				</div>
			</form>
		</div>
		<div class="col-sm-4">
			
		</div>
	</div>
</div>
@endsection
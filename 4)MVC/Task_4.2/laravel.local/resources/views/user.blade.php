<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($migrs as $migr)
		<div>
			<h2>{{ $migr->migration }}</h2>
			<div>
				{{ $migr->batch }}
			</div>
		</div>
	@endforeach
</body>
</html>
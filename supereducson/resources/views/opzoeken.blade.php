<form>
    @foreach($domeinen as $domein)
    {{ $domein->domeinnaam }} 
    <input type="checkbox" id="" name="domein[]" value="{{ $domein->id }}">
    <br>
    @endforeach
    <br><br><br><br>
    @foreach($niveaux as $niveau)
    {{ $niveau->niveau }} 
    <input type="checkbox" id="" name="niveau[]" value="{{ $niveau->niveau }}">
    <br>
    @endforeach
    <br><br><br><br>


    <label for="">Tags: [Gebruik "#" om tags te onderscheiden]</label><br>
    <input type="text" id="tagchain" name="tagchain"><br>
    <input type="submit" name="submit" value="submit">
    <br><br><br><br><br>
</form>



@foreach($kwalificatiedosiers as $kwalificatiedosier)
    <form action="dossier/{{ $kwalificatiedosier->id }}" method="GET" class="form-horizontal">>
    {{ $kwalificatiedosier->krebonummer }}<br>
    {{ $kwalificatiedosier->titel }}<br><br>
    <input type="submit" name="id" value="{{ $kwalificatiedosier->id }}">
    </form>
@endforeach



@component('mail::message')
# Dear Pejuang NPLC, Kelompok {{ $name }}

{{ $mail['message']  }}

@component('mail::button', ['url' => 'https://forms.gle/R2jEpUF17fJghtuz6'])
Form Daftar Ulang
@endcomponent

# Pendaftaran ulang paling lambat:
<p><span style="padding-right: 17px">Hari</span>     :  <b>Rabu, 6 November 2019</b></p>
<p><span>Waktu</span>    : <b>23.59 WIB</b></p>

Setelah waktu diatas, peserta akan didiskualifikasi dari babak final 7th NPLC secara otomatis.

Regards,<br>
7th NPLC Team.
@endcomponent

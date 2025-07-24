# Quiz Lab.
Tidak untuk diunggah pada production server, kecuali Anda mengerti risiko yang ditimbulkan.

# Build and Run

```
> docker compose up -d --build
```

Kunjungi http://localhost:8080 via web browser

username : guest
password : guest123

# Kerentanan dan Bug yang diketahui

- SQL Injection di login.php
- XSS di product.php
- CSRF di delete_comment.php
- Bad error handling di product.php
- Session Hijacking di delete_comment.php
- ...

# Instruksi

1. Eksploitasi setiap kerentanan yang diketahui dan yang tidak diketahui.
3. Analisis penyebab dan tuliskan di laporan.
4. Perbaiki kode sumber agar tidak rentan.
5. Buktikan perbaikan Anda berhasil.
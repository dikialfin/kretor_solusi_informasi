SELECT
    mk.NamaMatakuliah,
    COUNT(n.NIRM) AS JumlahMahasiswa
FROM
    tMatakuliah mk
JOIN
    tNilai n ON mk.KodeMK = n.KodeMK
GROUP BY
    mk.NamaMatakuliah
ORDER BY
    JumlahMahasiswa DESC
LIMIT 1;
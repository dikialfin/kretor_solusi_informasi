SELECT
    m.NamaMahasiswa
FROM
    tMahasiswa m
JOIN
    tNilai n ON m.NIRM = n.NIRM
JOIN
    tMatakuliah mk ON n.KodeMK = mk.KodeMK
WHERE
    mk.NamaMatakuliah IN ('Matematika', 'Aljabar')
GROUP BY
    m.NamaMahasiswa
HAVING
    COUNT(DISTINCT mk.NamaMatakuliah) = 2;
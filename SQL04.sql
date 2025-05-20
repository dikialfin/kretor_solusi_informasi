SELECT
    mk.NamaMatakuliah,
    AVG(n.Grade) AS RataRataNilai
FROM
    tMatakuliah mk
JOIN
    tNilai n ON mk.KodeMK = n.KodeMK
GROUP BY
    mk.NamaMatakuliah
ORDER BY
    mk.NamaMatakuliah;
SELECT
    mk.NamaMatakuliah,
    AVG(n.Grade) AS RataRataNilai
FROM
    tMatakuliah mk
JOIN
    tNilai n ON mk.KodeMK = n.KodeMK
GROUP BY
    mk.NamaMatakuliah
HAVING
    AVG(n.Grade) > 75
ORDER BY
    RataRataNilai DESC;
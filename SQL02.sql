SELECT
    mk.KodeMK,
    mk.NamaMatakuliah,
    mk.Pengajar
FROM
    tMatakuliah mk
LEFT JOIN
    tNilai n ON mk.KodeMK = n.KodeMK
WHERE
    n.KodeMK IS NULL;
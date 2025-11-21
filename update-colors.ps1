$files = @(
    'app/Views/layouts/admin.php',
    'app/Views/layouts/default.php'
)

$replacements = @{
    "'#eef2ff'" = "'#f0faf8'"
    "'#e0e7ff'" = "'#d1f2eb'"
    "'#c7d2fe'" = "'#a3e5d7'"
    "'#a5b4fc'" = "'#75d8c3'"
    "'#818cf8'" = "'#65CCB8'"
    "'#6366f1'" = "'#57BA98'"
    "'#4f46e5'" = "'#3B945E'"
    "'#4338ca'" = "'#2f7549'"
    "'#3730a3'" = "'#235634'"
    "'#312e81'" = "'#182628'"
}

foreach ($file in $files) {
    $content = Get-Content $file -Raw
    foreach ($old in $replacements.Keys) {
        $new = $replacements[$old]
        $content = $content -replace [regex]::Escape($old), $new
    }
    Set-Content $file $content -NoNewline
    Write-Host "Updated $file"
}

# Login page has slightly different colors
$loginFile = 'app/Views/auth/login.php'
$loginReplacements = @{
    "'#eff6ff'" = "'#f0faf8'"
    "'#dbeafe'" = "'#d1f2eb'"
    "'#bfdbfe'" = "'#a3e5d7'"
    "'#93c5fd'" = "'#75d8c3'"
    "'#60a5fa'" = "'#65CCB8'"
    "'#3b82f6'" = "'#57BA98'"
    "'#2563eb'" = "'#3B945E'"
    "'#1d4ed8'" = "'#2f7549'"
    "'#1e40af'" = "'#235634'"
    "'#1e3a8a'" = "'#182628'"
}

$content = Get-Content $loginFile -Raw
foreach ($old in $loginReplacements.Keys) {
    $new = $loginReplacements[$old]
    $content = $content -replace [regex]::Escape($old), $new
}
Set-Content $loginFile $content -NoNewline
Write-Host "Updated $loginFile"

Write-Host "All files updated with ocean green color scheme!"

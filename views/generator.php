<?php
$user = $_SESSION['user'];
$config = require __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signatures - Groupe Speed Cloud</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'speed-purple': '#8a4dfd',
                        'speed-purple-dark': '#7040d9',
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-purple-900 to-gray-900" style="font-family: 'Titillium Web', sans-serif;">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-10">
            <div class="flex items-center gap-4">
                <img src="/assets/images/cloudy.png" alt="Groupe Speed Cloud" class="w-12 h-12 rounded-xl">
                <div>
                    <h1 class="text-xl font-bold text-white">Signatures</h1>
                    <p class="text-gray-400 text-sm">Groupe Speed Cloud</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-3">
                    <?php if ($user['picture']): ?>
                    <img src="<?= htmlspecialchars($user['picture']) ?>" alt="" class="w-10 h-10 rounded-full">
                    <?php endif; ?>
                    <div class="text-right">
                        <p class="text-white text-sm font-medium"><?= htmlspecialchars($user['name']) ?></p>
                        <p class="text-gray-400 text-xs"><?= htmlspecialchars($user['email']) ?></p>
                    </div>
                </div>
                <a href="/logout.php" class="text-gray-400 hover:text-white transition" title="Déconnexion">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto bg-white/10 backdrop-blur-lg rounded-2xl p-8 shadow-2xl border border-white/20">
            <form id="generator" class="grid md:grid-cols-2 gap-6 mb-8">
                <div>
                    <label for="firstname" class="block text-sm font-semibold text-gray-200 mb-2">Prénom</label>
                    <input type="text" id="firstname" value="<?= htmlspecialchars($user['firstName']) ?>" 
                        class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-speed-purple transition">
                </div>
                <div>
                    <label for="lastname" class="block text-sm font-semibold text-gray-200 mb-2">Nom</label>
                    <input type="text" id="lastname" value="<?= htmlspecialchars($user['lastName']) ?>" 
                        class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-speed-purple transition">
                </div>
                <div>
                    <label for="job" class="block text-sm font-semibold text-gray-200 mb-2">Poste</label>
                    <input type="text" id="job" placeholder="Votre fonction" 
                        class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-speed-purple transition">
                </div>
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-200 mb-2">E-mail</label>
                    <input type="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" readonly
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-lg text-gray-400 cursor-not-allowed">
                </div>
                <div class="md:col-span-2">
                    <label for="style" class="block text-sm font-semibold text-gray-200 mb-2">Client email</label>
                    <div class="grid grid-cols-3 gap-4">
                        <label class="cursor-pointer">
                            <input type="radio" name="style" value="gmail" class="peer hidden" checked>
                            <div class="p-4 bg-white/5 border-2 border-white/10 rounded-lg text-center peer-checked:border-speed-purple peer-checked:bg-speed-purple/20 transition">
                                <span class="text-white font-medium">Gmail</span>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="style" value="outlook" class="peer hidden">
                            <div class="p-4 bg-white/5 border-2 border-white/10 rounded-lg text-center peer-checked:border-speed-purple peer-checked:bg-speed-purple/20 transition">
                                <span class="text-white font-medium">Outlook</span>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="style" value="chatwoot" class="peer hidden">
                            <div class="p-4 bg-white/5 border-2 border-white/10 rounded-lg text-center peer-checked:border-speed-purple peer-checked:bg-speed-purple/20 transition">
                                <span class="text-white font-medium">Chatwoot</span>
                            </div>
                        </label>
                    </div>
                </div>
            </form>

            <!-- Preview -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                <div class="bg-gray-100 px-4 py-2 border-b flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        <span class="ml-4 text-sm text-gray-500">Aperçu de la signature</span>
                    </div>
                    <button id="copyBtn" class="text-sm bg-speed-purple text-white px-3 py-1 rounded hover:bg-speed-purple-dark transition">
                        Copier
                    </button>
                </div>
                <div id="preview" class="p-6 bg-white min-h-[200px]">
                    <!-- Signature générée ici -->
                </div>
            </div>

            <!-- Instructions -->
            <div class="mt-6 p-4 bg-speed-purple/20 rounded-lg border border-speed-purple/30">
                <h3 class="text-white font-semibold mb-2">💡 Comment utiliser</h3>
                <ol class="text-gray-300 text-sm space-y-1 list-decimal list-inside">
                    <li>Remplissez votre poste ci-dessus</li>
                    <li>Sélectionnez votre client email</li>
                    <li>Cliquez sur "Copier" ou sélectionnez la signature (Ctrl+A dans l'aperçu)</li>
                    <li>Collez dans les paramètres de signature de votre client email</li>
                </ol>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8 text-gray-400 text-sm">
            © <?= date('Y') ?> Groupe Speed Cloud - Tous droits réservés
        </div>
    </div>

    <script>
        const form = document.getElementById('generator');
        const preview = document.getElementById('preview');
        const copyBtn = document.getElementById('copyBtn');
        
        async function updatePreview() {
            const style = form.querySelector('input[name="style"]:checked').value;
            const data = new URLSearchParams({
                style: style,
                name: `${form.firstname.value} ${form.lastname.value}`.trim(),
                job: form.job.value,
                email: form.email.value
            });
            
            try {
                const response = await fetch('/signature.php?' + data.toString());
                preview.innerHTML = await response.text();
            } catch (e) {
                console.error(e);
            }
        }
        
        // Événements
        form.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', updatePreview);
            input.addEventListener('change', updatePreview);
        });
        
        // Copier
        copyBtn.addEventListener('click', async () => {
            try {
                const selection = window.getSelection();
                const range = document.createRange();
                range.selectNodeContents(preview);
                selection.removeAllRanges();
                selection.addRange(range);
                document.execCommand('copy');
                selection.removeAllRanges();
                
                copyBtn.textContent = '✓ Copié !';
                setTimeout(() => copyBtn.textContent = 'Copier', 2000);
            } catch (e) {
                console.error(e);
            }
        });
        
        // Init
        updatePreview();
    </script>
</body>
</html>

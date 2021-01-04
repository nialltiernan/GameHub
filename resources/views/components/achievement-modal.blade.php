<div id="achievements-modal" class="hidden-modal">
    <div class="flex h-screen">
        <span class="text-6xl hover:text-gray-500 absolute" style="right: 3.5rem" onclick="hideAchievementModal()">&times;</span>
        <span class="text-6xl hover:text-gray-500 fixed" style="top: 50%; left: 2rem" onclick="previousAchievementModal()">{{ '<' }}</span>
        <span class="text-6xl hover:text-gray-500 absolute" style="top: 50%; right: 2rem" onclick="nextAchievementModal()">{{ '>' }}</span>
        <img id="achievement-modal-image" src="" class="m-auto" alt="achievement modal">
    </div>
</div>

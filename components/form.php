<form action="/utils/process.php" method="POST">
    <fieldset>
        <legend>Informations de votre séance</legend>
        <label for="date">Date</label>
        <input type="date" id="date" name="date" required>
        <label for="lieu">Lieu</label>
        <select id="lieu" name="lieu" required>
            <option value="">Sélectionnez un FitnessPark</option>
            <option value="FitnessPark Paris Rambuteau">FitnessPark Paris Rambuteau</option>
            <option value="FitnessPark Paris Gare de Lyon">FitnessPark Paris Gare de Lyon</option>
            <option value="FitnessPark Saint-Ouen">FitnessPark Saint-Ouen</option>
            <option value="FitnessPark Paris Chatelêt">FitnessPark Paris Chatelêt</option>
        </select>
        <label for="heure">Heure</label>
        <input type="time" id="heure" name="heure" value="08:00" required>
    </fieldset>
    <fieldset>
        <legend>Vos informations de contact</legend>
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="Law" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="test@mail.com" required>
        <label for="telephone">Téléphone</label>
        <input type="tel" id="telephone" name="telephone" value="0612345789" required>
    </fieldset>
    <button type="submit">Valider</button>
</form>
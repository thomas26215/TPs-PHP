<?php

// Une heure dans le monde 
class Time implements JsonSerializable
{
  
  private DateTime $dateTime; // L'objet PHP qui représente le temps
  private string $timeZone; // Un fuseau horaire

  // Constructeur
  public function __construct(string $timeZone = 'Europe/Paris')
  {
    $this->dateTime = new DateTime();
    $this->dateTime->setTimezone(new DateTimeZone($timeZone));
    $this->timeZone = $timeZone;
  }

  // Transforme la date en une chaine
 public function dateToString() : string
{
    return $this->dateTime->format('d/m/Y H:i:s');
}

  // Informations à produire quand l'objet est tranformé en JSON
  public function jsonSerialize(): mixed
  {
    return array(
      "timeZone" => $this->timeZone,
      "date" => $this->dateToString()
    );
  }

}
?>

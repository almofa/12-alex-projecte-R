<?php declare( strict_types=1);

namespace App\Entity;

use App\Core\Entity;
use DateTime;
use JsonSerializable;

/**
 * Class Movie
 * @package App\Entity
 */
class Movie implements Entity, JsonSerializable
{
    /**
     *
     */
    const POSTER_PATH = 'images/posters/';
    /**
     * @var int|null
     */
    private ?int $id = null;
    /**
     * @var string
     */
    private string $title;
    /**
     * @var string
     */
    private string $overview;
    // private string $release_date;
    /**
     * @var DateTime
     */
    private DateTime $releaseDate;
    /**
     * @var string|null
     */
    private ?string $tagline;
    /**
     * @var string
     */
    private string $poster;
    /**
     * @var int
     */
    private int $genre_id;

    /**
     * @return int
     */
    public function getGenreId(): int
    {
        return $this->genre_id;
    }

    /**
     * @param int $genre_id
     * @return Movie
     */
    public function setGenreId(int $genre_id): Movie
    {
        $this->genre_id = $genre_id;
        return $this;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set(string $name, $value){
        switch ($name) {
            case "release_date":
                $this->releaseDate = DateTime::createFromFormat("Y-m-d", $value ?? date("Y-m-d"));
                break;
        }
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Movie
     */
    public function setId(int $id): Movie
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Movie
     */
    public function setTitle(string $title): Movie
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getOverview(): string
    {
        return $this->overview;
    }

    /**
     * @param string $overview
     * @return Movie
     */
    public function setOverview(string $overview): Movie
    {
        $this->overview = $overview;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getReleaseDate(): DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @param DateTime $releaseDate
     * @return Movie
     */
    public function setReleaseDate(DateTime $releaseDate): Movie
    {
        $this->releaseDate = $releaseDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getTagline(): ?string
    {
        return $this->tagline;
    }

    /**
     * @param string|null $tagline
     * @return Movie
     */
    public function setTagline(?string $tagline): Movie
    {
        $this->tagline = $tagline;
        return $this;
    }


    /**
     * @return string
     */
    public function getPoster(): string
    {
        return $this->poster;
    }

    /**
     * @param string $poster
     * @return Movie
     */
    public function setPoster(string $poster): Movie
    {
        $this->poster = $poster;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "id"=>$this->getId(),
            "tagline"=>$this->getTagline(),
            "overview"=>$this->getOverview(),
            "poster"=>$this->getPoster(),
            "release_date"=>$this->getReleaseDate()->format("Y-m-d"),
            "title"=>$this->getTitle(),
            "genre_id"=>$this->getGenreId()
        ];
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        // TODO: Implement jsonSerialize() method.
        return $this->toArray();
    }
}
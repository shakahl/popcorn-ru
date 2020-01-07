<?php

namespace App\Entity;

use App\Entity\Locale\MovieLocale;
use App\Entity\Locale\ShowLocale;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="shows")
 * @ORM\Entity(repositoryClass="App\Repository\ShowRepository")
 */
class Show extends BaseMedia
{
    public function __construct()
    {
        parent::__construct();
        $this->torrents = new ArrayCollection();
    }

    /**
     * @var ShowTorrent[]&Collection
     * @ORM\OneToMany(targetEntity="App\Entity\ShowTorrent", fetch="EAGER", mappedBy="show")
     * @ORM\OrderBy({"peer" = "ASC"})
     */
    protected $torrents;
    public function getTorrents() { return $this->torrents; }

    /**
     * @var ShowLocale[]
     * @ORM\OneToMany(targetEntity="App\Entity\Locale\ShowLocale", fetch="EAGER", mappedBy="show")
     */
    protected $locales;
    public function getLocales() { return $this->locales; }

    /**
     * @var Episode[]&Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Episode", mappedBy="show")
     */
    protected $episodes;
    public function getEpisodes() { return $this->episodes; }

    //<editor-fold desc="Show Api Data">
    /**
     * @var string
     * @ORM\Column(type="string", unique=true)
     */
    protected $imdb;
    public function getImdb() { return $this->imdb; }
    public function setImdb($imdb) { $this->imdb = $imdb; return $this;}

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $tvdb;
    public function getTvdb() { return $this->tvdb; }
    public function setTvdb($tvdb) { $this->tvdb = $tvdb; return $this;}

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $slug;
    public function getSlug() { return $this->slug; }
    public function setSlug($slug) { $this->slug = $slug; return $this;}

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $country;
    public function getCountry() { return $this->country; }
    public function setCountry($country) { $this->country = $country; return $this;}

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $network;
    public function getNetwork() { return $this->network; }
    public function setNetwork($network) { $this->network = $network; return $this;}

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $airDay;
    public function getAirDay() { return $this->airDay; }
    public function setAirDay($airDay) { $this->airDay = $airDay; return $this;}

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $airTime;
    public function getAirTime() { return $this->airTime; }
    public function setAirTime($airTime) { $this->airTime = $airTime; return $this;}

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $status;
    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; return $this;}

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    protected $numSeasons;
    public function getNumSeasons() { return $this->numSeasons; }
    public function setNumSeasons($numSeasons) { $this->numSeasons = $numSeasons; return $this;}

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    protected $lastUpdated;
    public function getLastUpdated() { return $this->lastUpdated; }
    public function setLastUpdated($lastUpdated) { $this->lastUpdated = $lastUpdated; return $this;}

    //</editor-fold>
}

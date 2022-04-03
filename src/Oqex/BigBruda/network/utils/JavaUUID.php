<?php

namespace Oqex\BigBruda\network\utils;

use InvalidArgumentException;
use pocketmine\utils\Binary;
use function bin2hex;
use function getmypid;
use function getmyuid;
use function hash;
use function hex2bin;
use function implode;
use function mt_rand;
use function str_replace;
use function strlen;
use function substr;
use function time;
use function trim;

class JavaUUID{

    private array $parts;
    private int $version;

    public function __construct(int $part1 = 0, int $part2 = 0, int $part3 = 0, int $part4 = 0, int $version = null){
        $this->parts = [$part1, $part2, $part3, $part4];

        $this->version = $version ?? ($this->parts[1] & 0xf000) >> 12;
    }

    public function getVersion() : int{
        return $this->version;
    }

    public function equals(self $self) : bool{
        return $self->parts === $this->parts;
    }

    /**
     * Creates an self from an hexadecimal representation
     */
    public static function fromString(string $self, int $version = null) : self{
        //TODO: should we be stricter about the notation (8-4-4-4-12)?
        $binary = @hex2bin(str_replace("-", "", trim($self)));
        if($binary === false){
            throw new InvalidArgumentException("Invalid hex string self representation");
        }
        return self::fromBinary($binary, $version);
    }

    /**
     * Creates an self from a binary representation
     *
     * @throws InvalidArgumentException
     */
    public static function fromBinary(string $self, int $version = null) : self{
        if(strlen($self) !== 16){
            throw new InvalidArgumentException("Must have exactly 16 bytes");
        }

        return new self(Binary::readInt(substr($self, 0, 4)), Binary::readInt(substr($self, 4, 4)), Binary::readInt(substr($self, 8, 4)), Binary::readInt(substr($self, 12, 4)), $version);
    }

    /**
     * Creates an selfv3 from binary data or list of binary data
     */
    public static function fromData(string ...$data) : self{
        $hash = hash("md5", implode($data), true);

        return self::fromBinary($hash, 3);
    }

    public static function fromRandom() : self{
        return self::fromData(Binary::writeInt(time()), Binary::writeShort(($pid = getmypid()) !== false ? $pid : 0), Binary::writeShort(($uid = getmyuid()) !== false ? $uid : 0), Binary::writeInt(mt_rand(-0x7fffffff, 0x7fffffff)), Binary::writeInt(mt_rand(-0x7fffffff, 0x7fffffff)));
    }

    public function toBinary() : string{
        return Binary::writeInt($this->parts[0]) . Binary::writeInt($this->parts[1]) . Binary::writeInt($this->parts[2]) . Binary::writeInt($this->parts[3]);
    }

    public function toString() : string{
        $hex = bin2hex($this->toBinary());

        //xxxxxxxx-xxxx-Mxxx-Nxxx-xxxxxxxxxxxx 8-4-4-4-12
        return substr($hex, 0, 8) . "-" . substr($hex, 8, 4) . "-" . substr($hex, 12, 4) . "-" . substr($hex, 16, 4) . "-" . substr($hex, 20, 12);
    }

    public function __toString() : string{
        return $this->toString();
    }

    /**
     * @return int
     * @throws InvalidArgumentException
     */
    public function getPart(int $partNumber){
        if($partNumber < 0 or $partNumber > 3){
            throw new InvalidArgumentException("Invalid self part index $partNumber");
        }
        return $this->parts[$partNumber];
    }

    /**
     * @return int[]
     */
    public function getParts() : array{
        return $this->parts;
    }
}
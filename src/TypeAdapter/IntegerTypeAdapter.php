<?php
/*
 * Copyright (c) Nate Brunette.
 * Distributed under the MIT License (http://opensource.org/licenses/MIT)
 */

declare(strict_types=1);

namespace Tebru\Gson\TypeAdapter;

use Tebru\Gson\JsonReadable;
use Tebru\Gson\JsonToken;
use Tebru\Gson\JsonWritable;
use Tebru\Gson\TypeAdapter;

/**
 * Class IntegerTypeAdapter
 *
 * @author Nate Brunette <n@tebru.net>
 */
class IntegerTypeAdapter extends TypeAdapter
{
    /**
     * Read the next value, convert it to its type and return it
     *
     * @param JsonReadable $reader
     * @return int|null
     */
    public function read(JsonReadable $reader): ?int
    {
        if ($reader->peek() === JsonToken::NULL) {
            $reader->nextNull();
            return null;
        }

        return $reader->nextInteger();
    }

    /**
     * Write the value to the writer for the type
     *
     * @param JsonWritable $writer
     * @param int|null $value
     * @return void
     */
    public function write(JsonWritable $writer, $value): void
    {
        if (null === $value) {
            $writer->writeNull();

            return;
        }

        $writer->writeInteger((int)$value);
    }
}
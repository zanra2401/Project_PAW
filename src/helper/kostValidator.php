<?php

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class KostValidator {
    function validateGambar($files)
    {
        // Pastikan $_FILES memiliki data yang sesuai
        if (!isset($files['name'], $files['tmp_name'], $files['type'], $files['error'], $files['size'])) {
            throw new \InvalidArgumentException('Data $_FILES tidak valid.');
        }

        // Ambil semua data file dari $_FILES
        $uploadedFiles = [];
        foreach ($files['tmp_name'] as $index => $tmpName) {
            if (is_uploaded_file($tmpName)) {
                $uploadedFiles[] = new UploadedFile(
                    $tmpName,               // Path sementara file
                    $files['name'][$index], // Nama file asli
                    $files['type'][$index], // Tipe MIME file
                    $files['error'][$index] // Error code file
                );
            }
        }

        // Validator Symfony
        $validator = Validation::createValidator();
        $violationsGambar = [];

        foreach ($uploadedFiles as $file) {
            $violations = $validator->validate(
                $file,
                [
                    new Assert\NotBlank(['message' => 'Gambar tidak boleh kosong.']),
                    new Assert\Image([
                        'mimeTypes' => ['image/jpeg', 'image/png'],
                        'mimeTypesMessage' => 'Gambar harus berformat JPEG atau PNG.',
                    ]),
                ]
            );

            // Simpan semua pelanggaran validasi (jika ada)
            if (count($violations) > 0) {
                $violationsGambar[] = $violations;
            }
        }

        return $violationsGambar;
    }

    function validateNamaKost($data)
    {
        $validator = Validation::createValidator();

        $violationsNama = $validator->validate(
            $data,
            [
                new Assert\NotBlank(['message' => 'Nama tidak boleh kosong.']),
                new Assert\Regex([
                    'pattern' => '/^[a-zA-Z0-9\s]+$/',
                    'message' => 'Nama hanya boleh berisi angka, huruf, dan spasi.'
                ])
            ]
        );

        return $violationsNama;
    }

    function validateHargaKost($data)
    {
        $validator = Validation::createValidator();

        $violationsHarga = $validator->validate(
            $data,
            [
                new Assert\NotBlank(['message' => 'Harga tidak boleh kosong.']),
                new Assert\Type([
                    'type' => 'numeric',
                    'message' => 'Harga hanya boleh berupa angka.'
                ])
            ]
        );
        return $violationsHarga;
    }

    function validateProvinsiKost($data)
    {
        $validator = Validation::createValidator();

        $violationsProvinsi = $validator->validate(
            $data,
            [
                new Assert\NotBlank(['message' => 'Provinsi tidak boleh kosong.']),
                new Assert\Type([
                    'type' => 'numeric',
                    'message' => 'Provinsi harus berupa angka.'
                ])
            ]
        );

        return $violationsProvinsi;
    }

    function validateKotaKost($data)
    {
        $validator = Validation::createValidator();

        $violationsKota = $validator->validate(
            $data,
            [
                new Assert\NotBlank(['message' => 'Kota tidak boleh kosong.']),
                new Assert\Type([
                    'type' => 'numeric',
                    'message' => 'Kota harus berupa angka.'
                ])
            ]
        );

        return $violationsKota;
    }

    function validateTipeKost($data)
    {
        $validator =  Validation::createValidator($data);

        $violationsTipe = $validator->validate(
            $data,
            [
                new Assert\NotBlank(['message' => 'Jenis kelamin tidak boleh kosong.']),
                new Assert\Choice([
                    'choices' => ['putra', 'putri'],
                    'message' => 'tidak valid tipe kos".'
                ])
            ]
        );

        return $violationsTipe;
    }

    function validateLatKost($data)
    {
        $validator =  Validation::createValidator();

        $violationsLat = $validator->validate(
            $data,
            [
                new Assert\NotBlank(['message' => 'Latitude tidak boleh kosong.']),
                new Assert\Regex([
                    'pattern' => '/^-?\d+(\.\d+)?$/',
                    'message' => 'Latitude harus berupa angka desimal.'
                ])
            ]
        );

        return $violationsLat;
    }

    function validateLongKost()
    {
        $validator =  Validation::createValidator();

        $violationsLong = $validator->validate(
            $data,
            [
                new Assert\NotBlank(['message' => 'Longitude tidak boleh kosong.']),
                new Assert\Regex([
                    'pattern' => '/^-?\d+(\.\d+)?$/',
                    'message' => 'Longitude harus berupa angka desimal.'
                ])
            ]
        );

        return $violationsLong;
    }

    function validateFasilitasBersamaKost($data, $valid)
    {
        $validator =  Validation::createValidator();

        $violationsFasilitasBersama = $validator->validate(
            $data,
            [
                new Assert\Choice([
                    'choices' => $valid,
                    'message' => 'fasilitas tidak valid'
                ])
            ]
        );

        return $violationsFasilitasBersama;
    }

    function validateFasilitasKamarKost($data, $valid)
    {
        $validator =  Validation::createValidator();

        $violationsFasilitasKamar = $validator->validate(
            $data,
            [
                new Assert\Choice([
                    'choices' => $valid,
                    'message' => 'fasilitas tidak valid'
                ])
            ]
        );

        return $violationsFasilitasKamar;
    }
}
<?php

namespace App\HTTP\Controller\Swagger;

use App\HTTP\Controller\Controller;

/**
 *  @OA\GET(
 *     path="/public/"
 *     summary="Главна страница HTML"
 *     tags="GET"
 *
 *     OA\RequestBody(
 *         @OA\JsonContent(
 *              allof={
 *                  @OA\Schema(
 *                        @OA\Property(property="html", type="string", example="!DOCTYPE html..."),
 *                      )
 *                  }
 *              )
 *           ),
 *     @OA\Response(
 *         response=200,
 *         description="ok"
 *               @OA\JsonContent(
 *                       @OA\Property(property="html", type="string", example="!DOCTYPE html..."),
 *           )
 *       ),
 *   ),
 *
 * @OA\GET(
 *     path="/public/make"
 *     summary="Создает таблицу"
 *     tags="GET"
 *
 *     OA\RequestBody(
 *         @OA\JsonContent(
 *              allof={
 *                  @OA\Schema(
 *                        @OA\Property(property="message", type="json", example="Table created successful"),
 *                      )
 *                  }
 *              )
 *           ),
 *     @OA\Response(
 *         response=200,
 *         description="ok"
 *               @OA\JsonContent(
 *                       @OA\Property(property="message", type="json", example="Table created successful"),
 *           )
 *       ),
 *   ),
 * @OA\GET(
 *     path="/public/create"
 *     summary="Парсинг данных с сайта, запись их в таблицу"
 *     tags="GET"
 *
 *     OA\RequestBody(
 *         @OA\JsonContent(
 *              allof={
 *                  @OA\Schema(
 *                        @OA\Property(property="message", type="json", example="Data inserted successful"),
 *                      ),
 *                  }
 *              ),
 *           ),
 *     @OA\Response(
 *         response=200,
 *         description="ok"
 *               @OA\JsonContent(
 *                       @OA\Property(property="message", type="json", example="Data inserted successful"),
 *             ),
 *         ),
 *    ),
 * * @OA\GET(
 *     path="/public/read"
 *     summary="Массив данных из таблицы"
 *     tags="GET"
 *
 *     OA\RequestBody(
 *         @OA\JsonContent(
 *              allof={
 *                  @OA\Schema(
 *                          @OA\Property(property="id", type="string", example="1"),
 *                          @OA\Property(property="date", type="string", example="2022-03-21"),
 *                          @OA\Property(property="title", type="string", example="Минстрой не планирует..."), *
 *                      ),
 *                  }
 *              ),
 *           ),
 *     @OA\Response(
 *         response=200,
 *         description="ok"
 *               @OA\JsonContent(
 *                       @OA\Property(property="array", type="object",
 *                                  @OA\Property(property="id", type="string", example="1"),
 *                                  @OA\Property(property="date", type="string", example="2022-03-21"),
 *                                  @OA\Property(property="title", type="string", example="Минстрой не планирует..."),
 *              ),
 *         ),
 *     ),
 * )
 */
class BizonRuEventsController extends Controller
{

}










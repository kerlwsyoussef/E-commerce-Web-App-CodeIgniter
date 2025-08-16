<?php

namespace Config;

/**
 * Paths
 *
 * Holds the paths that are used by the system to
 * locate the main directories, app, system, etc.
 *
 * Modifying these allows you to restructure your application,
 * share a system folder between multiple applications, and more.
 *
 * All paths are relative to the project's root folder.
 *
 * NOTE: This class is required prior to Autoloader instantiation,
 *       and does not extend BaseConfig.
 *
 * @immutable
 */
class Paths
{
    /**
     * ---------------------------------------------------------------
     * SYSTEM FOLDER NAME
     * ---------------------------------------------------------------
     *
     * This must contain the name of your "system" folder. Include
     * the path if the folder is not in the same directory as this file.
     */
    public string $systemDirectory = __DIR__ . '/../../system';

    /**
     * ---------------------------------------------------------------
     * APPLICATION FOLDER NAME
     * ---------------------------------------------------------------
     */
    public string $appDirectory = __DIR__ . '/../';

    /**
     * ---------------------------------------------------------------
     * WRITABLE DIRECTORY NAME
     * ---------------------------------------------------------------
     */
    public string $writableDirectory = __DIR__ . '/../../writable';

    /**
     * ---------------------------------------------------------------
     * TESTS DIRECTORY NAME
     * ---------------------------------------------------------------
     */
    public string $testsDirectory = __DIR__ . '/../../tests';

    /**
     * ---------------------------------------------------------------
     * VIEW DIRECTORY NAME
     * ---------------------------------------------------------------
     */
    public string $viewDirectory = __DIR__ . '/../Views';

    /**
     * ---------------------------------------------------------------
     * VENDOR DIRECTORY NAME
     * ---------------------------------------------------------------
     * This MUST point to your Composer vendor folder.
     */
    public string $vendorDirectory = __DIR__ . '/../../vendor';
}

<?php

namespace Nacosvel\TransactionManager\Concerns;

trait DistributedTransactionGrammar
{
    /**
     * Compile the SQL statement to define a savepoint.
     *
     * @param string $name
     *
     * @return string
     */
    #[\Override]
    public function compileSavepoint(string $name): string
    {
        return 'SAVEPOINT ' . $name;
    }

    /**
     * Compile the SQL statement to execute a savepoint rollback.
     *
     * @param string $name
     *
     * @return string
     */
    #[\Override]
    public function compileSavepointRollBack(string $name): string
    {
        return 'ROLLBACK TO SAVEPOINT ' . $name;
    }

    /**
     * Compile the SQL statement to start an XA transaction.
     *
     * @param string $xid The transaction ID.
     *
     * @return string The SQL statement to start an XA transaction.
     */
    public function compileXaStart(string $xid): string
    {
        return "XA START '{$xid}'";
    }

    /**
     * Compile the SQL statement to end an XA transaction.
     *
     * @param string $xid The transaction ID.
     *
     * @return string The SQL statement to end an XA transaction.
     */
    public function compileXaEnd(string $xid): string
    {
        return "XA END '{$xid}'";
    }

    /**
     * Compile the SQL statement to prepare an XA transaction.
     *
     * @param string $xid The transaction ID.
     *
     * @return string The SQL statement to prepare an XA transaction.
     */
    public function compileXaPrepare(string $xid): string
    {
        return "XA PREPARE '{$xid}'";
    }

    /**
     * Compile the SQL statement to commit an XA transaction.
     *
     * @param string $xid The transaction ID.
     *
     * @return string The SQL statement to commit an XA transaction.
     */
    public function compileXaCommit(string $xid): string
    {
        return "XA COMMIT '{$xid}'";
    }

    /**
     * Compile the SQL statement to roll back an XA transaction.
     *
     * @param string $xid The transaction ID.
     *
     * @return string The SQL statement to roll back an XA transaction.
     */
    public function compileXaRollback(string $xid): string
    {
        return "XA ROLLBACK '{$xid}'";
    }

    /**
     * Compile the SQL statement to recover an XA transaction.
     *
     * @param string $xid The transaction ID.
     *
     * @return string The SQL statement to recover an XA transaction.
     */
    public function compileXaRecover(string $xid): string
    {
        return "XA RECOVER '{$xid}'";
    }

}

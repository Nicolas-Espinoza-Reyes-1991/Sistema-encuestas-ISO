<tbody style="background-color:#edf2f7;">
    <tr>
        <td style="box-sizing:border-box; padding:25px 0;" align="left">
            <img src="" height="60" style="padding-left:29px;padding-right:150px;" alt="portalEncuestas_logo">
        
            <img src="" height="30" alt="evsd" style="margin-top:-20px;padding-right:10px;">
        </td>
    </tr>
    <tr>
        <td width="100%" cellpadding="0" cellspacing="0"
            style="box-sizing:border-box; background-color:#edf2f7;border-bottom:1px solid #edf2f7;border-top:1px solid #edf2f7;margin:0;padding:0;width:100%">
            <table class="m_8710798823991925228inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                role="presentation"
                style="box-sizing:border-box; background-color:#ffffff;border-color:#e8e5ef;border-radius:2px;border-width:1px;margin:0 auto;padding:0;width:570px">
                <tbody>
                    <tr>
                        <td style="box-sizing:border-box; max-width:100vw;padding:32px">
                            <h1 style="text-transform: capitalize; box-sizing:border-box; color:#3d4852;font-size:18px;font-weight:bold;margin-top:0;text-align:left">
                                Hola {{$details ['name'] }}:</h1>
                                <br>
                            <p style="box-sizing:border-box; font-size:12px;line-height:1.5em;margin-top:0;text-align:left">
                                Ha completado su encuesta. Si desea ver sus resultados, debe ingresar con el <u>token asignado</u>:
                            </p>
                            <p style="box-sizing:border-box; font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                <b>{{$details ['remember_token'] }}</b>
                            </p>
                            <p style="box-sizing:border-box; font-size:12px;line-height:1.5em;margin-top:0;text-align:left">
                                Revise los resultados en el siguiente link: <a href="{{ url('/')}}">Portal de encuestas</a>
                            </p>
                            <br>
                            <p style="box-sizing:border-box; font-size:12px;line-height:1.5em;margin-top:0;text-align:left"> ¡Saludos!</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td
            style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
            <table class="m_8710798823991925228footer" align="center" width="570" cellpadding="0" cellspacing="0"
                role="presentation"
                style="box-sizing:border-box; margin:0 auto;padding:0;text-align:center;width:570px">
                <tbody>
                    <tr>
                        <td align="center"
                            style="box-sizing:border-box; max-width:100vw;padding:32px">

                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</tbody>
